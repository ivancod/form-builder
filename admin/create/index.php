<?php


/**
 * VSFB_Create class will create the page to load the settings
 */

class VSFB_Create
{
    public $view_path = ABSPATH . 'wp-content/plugins/form-builder/admin/views';

	/**
	 * This is our constructor
	 *
	 * @return void
	 */

	public function __construct() 
	{
        $this->view();
	}

    /**
     * Get the table data
     *
     * @return String
     */

    public function view()
    { 
        $view_path = ABSPATH . 'wp-content/plugins/form-builder/admin/views';
        require_once ($view_path . '/create/index.php');
    }
}
    
new VSFB_Create();
