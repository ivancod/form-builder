<?php
require_once __DIR__ . '/ListTable.php';

$Table = new VS_List_Table();
$Table->prepare_items();

?>

<div class="wrap">
    <h1><?= esc_html( get_admin_page_title() ) ?></h1>

    <div class="tab-content">
        <? $Table->display() ?>
    </div>
</div>

<?