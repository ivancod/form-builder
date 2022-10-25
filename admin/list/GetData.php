<?php

/**
 * VS_Get_Data class will create the page to load the table
 */

class VSFB_Get_Data
{
    /**
     * Get the table data
     *
     * @return Array
     */
    public function data()
    {
        $data = array();

        $data[] = array(
                    'id'          => 1,
                    'title'       => 'The Shawshank Redemption',
                    'created_at'  => '1994',
                    'status'      => 1
                    );

        $data[] = array(
                    'id'          => 2,
                    'title'       => 'The Godfather',
                    'created_at'  => '1972',
                    'status'      => 1
                    );

        $data[] = array(
                    'id'          => 8,
                    'title'       => 'Schindler\'s List',
                    'created_at'  => '1993',
                    'status'      => 0
                    );

        $data[] = array(
                    'id'          => 9,
                    'title'       => 'The Lord of the Rings: The Return of the King',
                    'created_at'  => '2003',
                    'status'      => 0
                    );

        $data[] = array(
                    'id'          => 10,
                    'title'       => 'Fight Club',
                    'created_at'  => '1999',
                    'status'      => 1
                    );

        return $data;
    }
}