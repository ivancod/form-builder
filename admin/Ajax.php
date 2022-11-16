<?php

// Start up the engine
class VS_Ajax
{
	public $plugin_slug = 'form-builder';
	
	/**
	 * This is our constructor
	 *
	 * @return void
	 */
	
	public function __construct() 
	{
        $this->form_actions();
        $this->setting_actions();
	}

    public function form_actions()
	{   
        // CREATE
        add_action( 'wp_ajax_nopriv_create_form', array($this, 'create_form') );
        add_action( 'wp_ajax_create_form', array($this, 'create_form') );
        // GET
        add_action( 'wp_ajax_nopriv_get_form', array($this, 'get_form') );
        add_action( 'wp_ajax_get_form', array($this, 'get_form') );
        // UPDATE
        add_action( 'wp_ajax_nopriv_update_form', array($this, 'update_form') );
        add_action( 'wp_ajax_update_form', array($this, 'update_form') );
        // CREATE
        add_action( 'wp_ajax_nopriv_delete_form', array($this, 'delete_form') );
        add_action( 'wp_ajax_delete_form', array($this, 'delete_form') );
    }

    public function create_form()
	{
        // $_POST['data']

        
    }

    public function get_form()
	{
        //$_GET['data']
		echo "get_form";
    }

    public function update_form()
	{
        // $_POST['data']
		echo "update_form";
    }

    public function delete_form()
	{
        // $_POST['data']
		echo "delete_form";
    }

    public function setting_actions()
	{
        // CREATE
        // add_action( 'wp_ajax_nopriv_create_form', array($this, 'create_form') );
        // add_action( 'wp_ajax_create_form', array($this, 'create_form') );
    }
}

new VS_Ajax();
