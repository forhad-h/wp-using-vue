<?php
/**
 * Plugin Name: WP using Vue
 * Description: A demo on how to use Vue in WordPress.
 * Plugin URI: https://github.com/forhad-h/wp-using-vue
 * Author: Forhad Hosain
 * Author URI: https://github.com/forhad-h/
 */

 // Register scripts
 function wpvue__register_scripts() {
   wp_register_script('wpvue_vuejs', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
   wp_register_script('wpvue_vuecode', plugin_dir_url(__FILE__).'vuecode.js', ['wpvue_vuejs'], '', true);
 }
 add_action('wp_enqueue_scripts', 'wpvue__register_scripts');


// Add shortcode
function wpvue_shorcode() {
  // Add Vue.js
  wp_enqueue_script('wpvue_vuejs');
  wp_enqueue_script('wpvue_vuecode');

  //Build String
  $str= "<div id='divWpVue'>"
   ."Message from Vue: {{ message }}"
   ."</div>";


  return $str;
}
add_shortcode('wpvue', 'wpvue_shorcode');
