<?php
require_once __DIR__ . '/ListTable.php';


/**
 * VSFB_List class will create the page to load the settings
 */

class VSFB_List
{
	/**
	 * This is our constructor
	 *
	 * @return void
	 */

	public function __construct() 
	{
        $Table = new VSFB_List_Table();
        $Table->prepare_items();

        $this->view($Table);
	}

    /**
     * Get the table data
     *
     * @return String
     */

    public function view($Table)
    { 
        require_once (ABSPATH . 'wp-content/plugins/form-builder/admin/views/list/index.php');
    }
}
    
new VSFB_List();
