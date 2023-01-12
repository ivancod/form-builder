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
	require_once __DIR__ . '/db/DataBase.php';
	require_once __DIR__ . '/db/wpdbx.php';

	// $db = new VSFB_DataBase();
	// $db->drop();
	// $db->create();

	if ( is_admin() ) {
		// we are in admin mode
		require_once __DIR__ . '/admin/index.php';
	} else {
		// we are in front mode
		require_once __DIR__ . '/front/index.php';
	}
});
