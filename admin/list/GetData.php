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
        global $wpdb;

        $stdClass = $wpdb->get_results("SELECT id, title, status, created_at FROM " . $wpdb->prefix . "fb_quest");
        $dataArray = json_decode(json_encode($stdClass), true);

        foreach ($dataArray as $key => $value) {
            $dataArray[$key]['created_at'] = date("d.m.Y H:i", $value['created_at']);
        }
        // print_r( $dataArray );
        return $dataArray;
    }
}