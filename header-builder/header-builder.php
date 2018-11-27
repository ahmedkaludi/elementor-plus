<?php

define('HEADER_FOOTER_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
define('HEADER_FOOTER_PLUGIN_DIR_URI', plugin_dir_url(__FILE__));
define('HEADER_FOOTER_PLUGIN_PATH_INCLUDE', HEADER_FOOTER_PLUGIN_PATH.'/include/');
define('HEADER_FOOTER_PLUGIN_VERSION', '1.0');
define('HEADER_FOOTER_PLUGIN_TEXT_DOMAIN', 'header-builder');

function header_footer_santizer($input, $setting){
	$input = wp_unslash( $input );
	if ( ! is_array( $input ) ) {
        $input = json_decode( urldecode_deep( $input ), true );
    }
    $input = sanitize_text_field_deep( $input );
    print_r($input);die;
    return ($input);
}

function sanitize_text_field_deep($value, $html = false)
    {
        if (!is_array($value)) {
            $value = wp_kses_post($value);
        } else {
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    $value[$k] = sanitize_text_field_deep($v);
                }
            }
        }
        return $value;
    }

function headerfooter_get_setting($name){
    $value = get_theme_mod($name);
    return $value;
}


function headerfooter_get_media($value, $size = null)
    {

        if (empty($value)) {
            return false;
        }

        if (!$size) {
            $size = 'full';
        }
        // attachment_url_to_postid
        if (is_numeric($value)) {
            $image_attributes = wp_get_attachment_image_src($value, $size);
            if ($image_attributes) {
                return $image_attributes[0];
            } else {
                return false;
            }
        } elseif (is_string($value)) {
            $img_id = attachment_url_to_postid($value);
            if ($img_id) {
                $image_attributes = wp_get_attachment_image_src($img_id, $size);
                if ($image_attributes) {
                    return $image_attributes[0];
                } else {
                    return false;
                }
            }
            return $value;
        } elseif (is_array($value)) {
            $value = wp_parse_args($value, array(
                'id'   => '',
                'url'  => '',
                'mime' => ''
            ));

            if (empty($value['id']) && empty($value['url'])) {
                return false;
            }

            $url = '';

            if (strpos($value['mime'], 'image/') !== false) {
                $image_attributes = wp_get_attachment_image_src($value['id'], $size);
                if ($image_attributes) {
                    $url = $image_attributes[0];
                }
            } else {
                $url = wp_get_attachment_url($value['id']);
            }

            if (!$url) {
                $url = $value['url'];
                if ($url) {
                    $img_id = attachment_url_to_postid($url);
                    if ($img_id) {
                        return wp_get_attachment_url($img_id);
                    }
                }
            }

            return $url;
        }

        return false;
    }

require_once(HEADER_FOOTER_PLUGIN_PATH_INCLUDE.'/frontend/class-customize-layout-builder-frontend.php');
require_once(HEADER_FOOTER_PLUGIN_PATH_INCLUDE.'/frontend/class-customize-layout-builder.php');

function HeaderFooter_Customize_Layout_Builder_Frontend() {
    return HeaderFooter_Customize_Layout_Builder_Frontend::get_instance();
}
function HeaderFooter_Customize_Layout_Builder() {
    return HeaderFooter_Customize_Layout_Builder::get_instance();
}

add_action('after_setup_theme', function(){
 add_action("header_footer_get_header_option_rander", "render_header_option_html");
 add_action("header_footer_get_footer_option_rander", "render_footer_option_html");

});

function render_footer_option_html(){
    echo '<footer class="site-footer" id="site-footer">';
    HeaderFooter_Customize_Layout_Builder_Frontend()->set_id( 'footer' );
    HeaderFooter_Customize_Layout_Builder_Frontend()->set_control_id( 'footer_builder_panel' );
    $list_items = HeaderFooter_Customize_Layout_Builder()->get_builder_items( 'footer' );
    
    HeaderFooter_Customize_Layout_Builder_Frontend()->set_config_items( $list_items );
    HeaderFooter_Customize_Layout_Builder_Frontend()->render();
    echo '</footer>';
}

 function render_header_option_html(){
   echo HeaderFooter_Customize_Layout_Builder_Frontend()->close_icon( ' close-panel close-sidebar-panel' );
    /**
     * Hook before header
     * @since 0.2.2
     */
    do_action( 'customizer/before-header' );
    echo '<header id="headerfooter-masthead" class="headerfooter-site-header">';
        echo '<div id="headerfooter-masthead-inner" class="headerfooter-site-header-inner">';
            $list_items = HeaderFooter_Customize_Layout_Builder()->get_builder_items( 'header' );
            HeaderFooter_Customize_Layout_Builder_Frontend()->set_config_items( $list_items );
            HeaderFooter_Customize_Layout_Builder_Frontend()->render();
            HeaderFooter_Customize_Layout_Builder_Frontend()->render_mobile_sidebar();
        echo '</div>';
    echo '</header>';
 }


require_once(HEADER_FOOTER_PLUGIN_PATH_INCLUDE.'/builder.php');

function initiateHeaderBuilder(){
	$object = \HeaderBuilder\HeaderBuild::get_instance();
	$object->init();
}

initiateHeaderBuilder();

