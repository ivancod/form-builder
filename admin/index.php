<?php

// Start up the engine
class VS_FormBuilder
{
	public $plugin_slug = 'form-builder';
	public $create_slug = 'form-builder-create';
	public $list_slug   = 'form-builder-list';
	public $settings_slug = 'form-builder-settings';
	
	/**
	 * This is our constructor
	 *
	 * @return void
	 */
	
	public function __construct() 
	{
        $this->add_menu_item();
	}

    public function add_menu_item() 
	{
        add_action('admin_menu', function () {
            add_menu_page(
                'Form Builder',
                'Form Builder',
                'manage_options',
                $this->plugin_slug,
                array($this, 'list_page'),
                'dashicons-chart-area',
                56
            );

			add_submenu_page( 
				$this->plugin_slug,
				'List form',
				'All forms',
				'manage_options',
				$this->list_slug,
				array($this, 'list_page'),
			);

			add_submenu_page( 
				$this->plugin_slug,
				'Create form',
				'Create',
				'manage_options',
				$this->create_slug,
				array($this, 'create_page'),
			);

			add_submenu_page( 
				$this->plugin_slug,
				'Settings',
				'Settings',
				'manage_options',
				$this->settings_slug,
				array($this, 'settings_page'),
			);
        });
    }
	
	public function list_page()
	{
		require_once __DIR__ . '/list/index.php';
    }

	public function create_page()
	{
		require_once __DIR__ . '/create/index.php';
	}

	public function settings_page()
	{
		require_once __DIR__ . '/settings/index.php';
	}
	
}

new VS_FormBuilder();
