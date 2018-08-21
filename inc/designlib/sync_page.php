<?php
//Sync Designs
define( 'ELEMENTOR_AMPFORWP_sync_url', 'https://wordpress-amp.000webhostapp.com/wp-json/' );
define( 'ELEMENTOR_AMPFORWP_sync_version_url', ELEMENTOR_AMPFORWP_sync_url.'elementor_design_layout/v1/get-elementor-version' );
define( 'ELEMENTOR_AMPFORWP_sync_design_url', ELEMENTOR_AMPFORWP_sync_url.'elementor_design_layout/v1/get-elementor-designs' );
add_action('admin_enqueue_scripts', 'ampforwp_elementor_plus_sync_script');

function ampforwp_elementor_plus_sync_script($hook){
   /* if ('edit.php' == $hook) {
        return;
    }*/
    wp_register_script('ampforwp_elementor_plus_sync_script', ELEMENTOR_AMPFORWP__FILE__URI . '/assets/js/ampforwp-sync.js', [ 'jquery' ], false, true );

    wp_localize_script( 'ampforwp_elementor_plus_sync_script', 'ampforwp_elem_sync_object',
                array( 'ajax_url' => admin_url( 'admin-ajax.php' ),
                ) );
    wp_enqueue_script('ampforwp_elementor_plus_sync_script');
}

add_action( 'wp_ajax_elementor_plus_update_design_library',  'elementor_plus_update_design_library' );
function elementor_plus_update_design_library(){
        $response = wp_remote_get( ELEMENTOR_AMPFORWP_sync_design_url,array('timeout'=> 120));
        if ( !is_array( $response ) ) {
            echo json_encode(array("status"=>400, "message"=>'cannot connect to server'));
            wp_die();
        }

        $status = $responseData = $metaData = '';
        $responseData = json_decode($response['body'],true);

        //Check current loaded Version 
        $current_loaded_version = get_option( 'ampforwp-elementor-plus-loaded-version',0);
        if(version_compare($current_loaded_version, $responseData['current_version']['version_detail'], '>=') ){
            echo json_encode(array("status"=>200, "message"=>'design already up to date'));
            wp_die();
            /*************Ending point***********************/

        }


        $post_type = elem_ampforwp_basics('post_type');
        $taxonomy = elem_ampforwp_basics('taxonomy');
            global $wpdb;
            $result = $wpdb->query( 
                    $wpdb->prepare("
                        DELETE posts,pt,pm
                        FROM wp_posts posts
                        LEFT JOIN wp_term_relationships pt ON pt.object_id = posts.ID
                        LEFT JOIN wp_postmeta pm ON pm.post_id = posts.ID
                        WHERE posts.post_type = %s
                        ", 
                        $post_type
                    ) 
            );
        foreach( $responseData['designs'] as $widgetType => $valCategory ){
            foreach( $valCategory['layouts'] as $key => $valDesigntype ){
                $designType = $key;
                $post_id = wp_insert_post(array('post_title'=> $valDesigntype['title'],
                                             'post_type'=>$post_type, 
                                            'post_status'  => 'publish',
                                             'post_content'=>'Desgn Layouts with markup and css')

                                        );
                wp_set_object_terms( $post_id, array(
                                                'name'=>$valCategory['name'],
                                                'slug'=>$valCategory['slug'],
                                                    ), $taxonomy );
                $metaData = array();
                // Check folder permission and define file location
                $amp_html_markup = array('amp_html'=>$valDesigntype['amp_template_html'],
                                        'amp_css'=>$valDesigntype['amp_template_css']
                                    );
                $non_amp_html_markup = array('non_amp_html'=>$valDesigntype[
                    'non_amp_template_html'],
                                        'non_amp_css'=>$valDesigntype['non_amp_template_css']
                                    );
                update_post_meta( $post_id, 'amp_html_markup', $amp_html_markup );
                update_post_meta( $post_id, 'non_amp_html_markup', $non_amp_html_markup );
                update_post_meta( $post_id, 'design_unique_name', $valDesigntype['design_unique_name'] );


                $media = media_sideload_image($valDesigntype['designImage'], $post_id);
                if(!empty($media) && !is_wp_error($media)){
                    $args = array(
                        'post_type' => 'attachment',
                        'posts_per_page' => -1,
                        'post_status' => 'any',
                        'post_parent' => $post_id
                    );

                    // reference new image to set as featured
                    $attachments = get_posts($args);

                    if(isset($attachments) && is_array($attachments)){
                        foreach($attachments as $attachment){
                            // grab source of full size images (so no 300x150 nonsense in path)
                            $image = wp_get_attachment_image_src($attachment->ID, 'full');
                            // determine if in the $media image we created, the string of the URL exists
                            if(strpos($media, $image[0]) !== false){
                                // if so, we found our image. set it as thumbnail
                                set_post_thumbnail($post_id, $attachment->ID);
                                // only want one image
                                break;
                            }
                        }
                    }
                }

            }
        }
        $current_version = update_option( 'ampforwp-elementor-plus-loaded-version',$responseData['current_version']['version_detail']);
        echo json_encode(array("status"=>200, "message"=>'Design inserted Successfully'));
            wp_die();

        wp_die();
    }







function ampforwp_elementor_plus_admin_notice(){
	    global $pagenow;
    $server_version = get_option( 'ampforwp-elementor-plus-version');
    $current_version = get_option( 'ampforwp-elementor-plus-loaded-version');
    // echo $current_version.", ".$server_version;die;
    if(version_compare($current_version, $server_version, '<') ){
    ?>
    <div class="notice notice-info is-dismissible" id="sync-status-notice" >
        <p>Click on <button type="button" value="sync" name="sync" id="ampforwp-elementor-sync" class="button-primary">Sync</button> to update Elementor Plus design library.<span class="ampforwp-response-status"></span></p>
    </div>
    <?php
    	//<img src="<?php echo admin_url('images/loading.gif');" class="jetpack-lazy-image ampforwp-lazy-image" data-lazy-loaded="1">
		}
	//}


    //Check Version
        echo '<div class="notice notice-info is-dismissible" id="sync-status-notice" >
        <p>Click on <button type="button" value="sync" name="sync" id="ampforwp-elementor-sync-versions" class="button-primary">Check Version</button>.<span class="ampforwp-response-status"></span></p>
        </div>';

}
 add_action( 'admin_notices',  'ampforwp_elementor_plus_admin_notice' );

add_action( 'wp_ajax_elementor_plus_update_design_version',  'elementor_plus_update_design_version' );
function elementor_plus_update_design_version(){
     $message = "cannot connect to server";
    $response = wp_remote_get( ELEMENTOR_AMPFORWP_sync_version_url, array('timeout'=> 120));
    if ( is_array( $response ) ) {
        $header = $response['headers']; // array of http header lines
        $body = $response['body']; // use the content
        $actualResponse = json_decode($body,true);
        if($actualResponse['status']==200){
            $current_version = get_option( 'ampforwp-elementor-plus-version',0);
            if( version_compare($current_version, $actualResponse['version'], '>=') ){
                $message = "current version is same";
            }else{
                update_option( 'ampforwp-elementor-plus-version',$actualResponse['version']);
                $message = "Version Updated Successfully";
            }
        }
    }
    echo json_encode(array("status"=>200,"message"=>$message));
    wp_die();
}