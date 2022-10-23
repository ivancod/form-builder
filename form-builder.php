<?php
/**
 * Plugin Name: FormBuilder 
 * Description: Плагин form builder
 * Plugin URI:  vanstep17@gmail.com
 * Author URI:  vanstep17@gmail.com
 * Author:      Ivan Step
 * Version:     1.0
 *
 */

add_action('init', function () {
	if ( is_admin() ) {
		// we are in admin mode
		require_once __DIR__ . '/admin/index.php';
	} 
});

// add_action( 'wp_enqueue_scripts', 'my_plugin_scripts' );

// function my_plugin_scripts() {
// 	wp_enqueue_style( 'style-my_plugin', '/'.PLUGINDIR.'/'.dirname( plugin_basename( __FILE__ ) ). '/assets/style.css' );
// 	wp_enqueue_script( 'script-my_plugin', '/'.PLUGINDIR.'/'.dirname( plugin_basename( __FILE__ ) ). '/assets/script.js', array(), '1.0.0', true );
// }