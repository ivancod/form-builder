<?php

// WP_List_Table, VS_Get_Data is not loaded automatically so we need to load it in our application
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

if( ! class_exists( 'VSFB_Get_Data' ) ) {
    require_once __DIR__ . '/GetData.php';
}

/**
 * Create a new table class that will extend the WP_List_Table
 */
class VSFB_List_Table extends WP_List_Table
{
    /**
     * Prepare the items for the table to process
     *
     * @return Void
     */
    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();
        
        $GetData = new VSFB_Get_Data();
        $data = $GetData->data();
        usort( $data, array( &$this, 'sort_data' ) );

        $perPage = 100;
        $currentPage = $this->get_pagenum();
        $totalItems = count( $data );

        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ));

        $data = array_slice($data, ( ($currentPage - 1) * $perPage ), $perPage);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }

    /**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Array
     */
    public function get_columns()
    {
        $columns = array(
            'title'       => 'Title',
            'status'      => 'Status',
            'created_at'  => 'Created',
        );

        return $columns;
    }

    /**
     * Define which columns are hidden
     *
     * @return Array
     */
    public function get_hidden_columns()
    {
        return array();
    }

    /**
     * Define the sortable columns
     *
     * @return Array
     */
    public function get_sortable_columns()
    {
        return array( 'id' => array('id', false) );
    }

    /**
     * Define what data to show on each column of the table
     *
     * @param  Array $item        Data
     * @param  String $column_name - Current column name
     *
     * @return Mixed
     */
    public function column_default( $item, $column_name )
    {
        switch( $column_name ) {
            case 'title':
            case 'status':
            case 'created_at':
                return $item[ $column_name ];
            default:
                return print_r( $item, true );
        }
    }

    /**
     * Allows you to sort the data by the variables set in the $_GET
     *
     * @return Mixed
     */
    private function sort_data( $a, $b )
    {
        // Set defaults
        $orderby = 'title';
        $order = 'asc';

        // If orderby is set, use this as the sort column
        if( !empty($_GET['orderby']) )
        {
            $orderby = $_GET['orderby'];
        }

        // If order is set use this as the order
        if( !empty($_GET['order']) )
        {
            $order = $_GET['order'];
        }


        $result = strcmp( $a[$orderby], $b[$orderby] );

        if($order === 'asc')
        {
            return $result;
        }

        return -$result;
    }

    public function column_title( $item ) {
        $edit_link = admin_url( 'admin.php?page=form-builder-create&edit=' . $item["id"] );
        $view_link = get_permalink( $item["id"] ); 
        $output    = '';
 
        // Title.
        $output .= '<strong><a href="' . esc_url( $edit_link ) . '" class="row-title">' . esc_html( $item["title"] ) . '</a></strong>';
 
        // Get actions.
        $actions = array(
            'edit'   => '<a href="' . esc_url( $edit_link ) . '">' . esc_html__( 'Edit', 'my_plugin' ) . '</a>',
            'delete' => '<a style="cursor:pointer" onClick="deleteQuest('. $item["id"] .')">' . esc_html__( 'Delete', 'my_plugin' ) . '</a>',
        );
 
        $row_actions = array();
 
        foreach ( $actions as $action => $link ) {
            $row_actions[] = '<span class="' . esc_attr( $action ) . '">' . $link . '</span>';
        }

        $output .= '<div class="row-actions">' . implode( ' | ', $row_actions ) . '</div>';

        return $output;
    }

    public function column_status( $item ) {
        $checked = $item["status"] ? 'true' : 'false';

        return ' <div class="checkbox-switch">
                    <input type="checkbox"  
                        onchange="changeStatus(this,'. $item["id"] .')"
                        checked="'. $checked .'"
                        value="'. $item["status"] .'"
                        class="input-checkbox"
                    >
                    <div class="checkbox-animate">
                        <span class="checkbox-off">OFF</span>
                        <span class="checkbox-on">ON</span>
                    </div>
                </div>';
    }

	public function display() {
		$singular = $this->_args['singular'];

		$this->screen->render_screen_reader_content( 'heading_list' );
		?>

        <table class="wp-list-table <?php echo implode( ' ', $this->get_table_classes() ); ?>">
            <thead>
                <tr>
                    <?php $this->print_column_headers(); ?>
                </tr>
            </thead>

            <tbody id="the-list" <?= $singular ? " data-wp-lists='list:$singular'" : '' ?> >
                <?php $this->display_rows_or_placeholder(); ?>
            </tbody>

            <tfoot>
                <tr>
                    <?php $this->print_column_headers( false ); ?>
                </tr>
            </tfoot>
        </table>

		<?php
		$this->display_tablenav( 'bottom' );
	}
}
