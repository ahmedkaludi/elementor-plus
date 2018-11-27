<?php
namespace HeaderBuilder\headerPanels\sections;
class MenuIconDesign{
	public $id = 'menu';
	public $name = 'Menu Icon';
	public $nameslug = 'menu-icon-';
	public $api_type = 'wp_section';
	public $panel = '';
	public $panelName = '';
	function __construct($panel,$panelName){
		$this->panel = $panel; 
		$this->panelName = $panelName; 
		$this->id = $this->nameslug. $this->panel;
	}
	function getFields(){
		return array(
				array(
					'api_type'			=> 'wp_section',
					'id' 				=> $this->nameslug. $this->panel,
			        'panel'    			=> $this->panel,
			        'panel_name'    	=> $this->panelName,
                    'width'             => '2',
					'title'    			=> __($this->name, HEADER_FOOTER_PLUGIN_TEXT_DOMAIN),
			        'description' 		=> __('Section description which does show up', HEADER_FOOTER_PLUGIN_TEXT_DOMAIN)
				),

				
				//settings
				array(
					'api_type'			=> 'wp_settings',
					'id'				=> 'setting'. $this->panel,
					'capability'        => 'edit_theme_options',
					"default"			=> "Black",
			        'sanitize_callback' => 'sanitize_text_field',
			        'transport'			=> 'postMessage'
			    ),
			    //control
			    array(
			    	'api_type'			=> 'wp_control',
			    	'id'				=> 'setting'. $this->panel,
			        'section' 			=> $this->nameslug. $this->panel,
			        'label'   			=> __('Enter COlor', HEADER_FOOTER_PLUGIN_TEXT_DOMAIN),
			        'type'    			=> 'text'
			    ),

			);
	}

	function render(){
        $label = sanitize_text_field( headerfooter_get_setting( 'nav_icon_text' ) );
        $show_label = headerfooter_get_setting('nav_icon_show_text', 'all' );
        $style = sanitize_text_field( headerfooter_get_setting('nav_icon_style' ) );
        $sizes = headerfooter_get_setting('nav_icon_size', 'all' );

        $classes = array('menu-mobile-toggle item-button');
        $label_classes = array( 'nav-icon--label' );
        if ( is_array( $show_label ) ) {
            foreach ( $show_label as $d => $v ) {
                if ( $v ) {

                } else {
                    $label_classes[] = 'hide-on-'.$d;
                }
            }
        }

        if ( empty( $sizes ) ) {
            $sizes = 'is-size-'.$sizes;
        }

        if ( is_string( $sizes ) ) {
            $classes[] = $sizes;
        } else {
            foreach ( $sizes as $d => $s ) {
                if ( !is_string( $s ) ) {
                    $s = 'is-size-medium';
                }

                $classes[] = 'is-size-'.$d.'-'.$s;
            }
        }

        if( $style ) {
            $classes[] = $style;
        }
        ?>
        <a class="<?php echo esc_attr( join(' ', $classes ) ); ?>">
            <span class="hamburger hamburger--squeeze">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </span>
            <?php
            if ( $show_label ) {
                echo '<span class="'.esc_attr( join( ' ', $label_classes ) ).'">'.$label.'</span>';
            }
            ?></a>
        <?php
    }
}