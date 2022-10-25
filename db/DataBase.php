<?php

/**
 * VSFB_DataBase class will create the page to load the table
 */

class VSFB_DataBase
{
    public $table_names = [
        "fb_ans_check",
        "fb_ans_rating",
        "fb_ans_text",
        "fb_block_check",
        "fb_block_rating",
        "fb_block_desc",
        "fb_block_text",
        "fb_block_title",
        "fb_quest_answers",
        "fb_quest_blocks",
        "fb_quest",
    ];

    /**
     * Get the table data
     *
     * @return String
     */

    public function craete() 
    {
        global $wpdb;

        $TABLES = $this->tables( $wpdb->prefix );
        
        foreach($TABLES as $query) {
            $wpdb->query( $query );
        }
    }

    public function drop() 
    {
        global $wpdb;

        foreach($this->table_names as $name) {
            $wpdb->query("DROP TABLE `{ $wpdb->prefix }{ $name }`");
        }
    }

    private function tables($prefix = "")
    {   
        $result = [];

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_quest` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `user_id` int(11) NOT NULL,
                        `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `status` int(11) NOT NULL,
                        `updated_at` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
                    ) ENGINE=InnoDB";

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_quest_answers` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `quest_id` int(11) NOT NULL,
                        `block_id` int(11) NOT NULL,
                        `fill_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `date` int(12) NOT NULL,
                        `created_at` timestamp NULL DEFAULT NULL
                    ) ENGINE=InnoDB";

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_quest_blocks` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `quest_id` int(11) NOT NULL,
                        `block_id` int(11) NOT NULL,
                        `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
                    ) ENGINE=InnoDB";

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_block_check` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `quest_id` int(11) NOT NULL,
                        `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `required` int(11) NOT NULL,
                        `custom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_0` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `updated_at` int(32) NOT NULL
                    ) ENGINE=InnoDB";

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_block_desc` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `quest_id` int(11) NOT NULL,
                        `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `updated_at` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
                    ) ENGINE=InnoDB";

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_block_rating` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `quest_id` int(11) NOT NULL,
                        `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `required` int(11) NOT NULL,
                        `type` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `custom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_0` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `updated_at` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
                    ) ENGINE=InnoDB";

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_block_text` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `quest_id` int(11) NOT NULL,
                        `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `required` int(11) NOT NULL,
                        `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `updated_at` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
                    ) ENGINE=InnoDB";

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_block_title` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `quest_id` int(11) NOT NULL,
                        `user_id` int(11) NOT NULL,
                        `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `updated_at` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
                    ) ENGINE=InnoDB";

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_ans_check` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `quest_id` int(11) NOT NULL,
                        `block_id` int(11) NOT NULL,
                        `fill_id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_0` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `date` int(12) NOT NULL,
                        `updated_at` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
                    ) ENGINE=InnoDB";

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_ans_rating` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `quest_id` int(11) NOT NULL,
                        `block_id` int(11) NOT NULL,
                        `fill_id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_0` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `ask_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `updated_at` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `date` int(12) NOT NULL
                    ) ENGINE=InnoDB";

        $result[] = "CREATE TABLE IF NOT EXISTS `{ $prefix }fb_ans_text` (
                        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        `quest_id` int(11) NOT NULL,
                        `block_id` int(11) NOT NULL,
                        `fill_id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `val` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `updated_at` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
                        `date` int(12) NOT NULL
                    ) ENGINE=InnoDB";

        return $result;
    }
}
