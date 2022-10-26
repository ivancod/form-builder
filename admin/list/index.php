<?php
require_once __DIR__ . '/ListTable.php';

$Table = new VSFB_List_Table();
$Table->prepare_items();

?>

<div class="privacy-settings-header" style="margin-left: -20px">
    <div class="privacy-settings-title-section">
        <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    </div>
</div>

<div class="wrap">
    <div class="tab-content">
        <? $Table->display() ?>
    </div>
</div>
