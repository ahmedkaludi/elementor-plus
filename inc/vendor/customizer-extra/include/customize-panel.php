<?php
if ( class_exists( 'WP_Customize_Panel' ) ) {

  class HFBuilder_WP_Customize_Panel extends \WP_Customize_Panel {

    public $panel;

    public $type = 'hf_panel';

    public function json() {

      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', 'class' ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;

      return $array;

    }

  }

}
