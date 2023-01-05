<div class="privacy-settings-header" style="margin-left: -20px">
    <div class="privacy-settings-title-section">
        <h1><?= esc_html( get_admin_page_title() ) ?></h1>
    </div>
</div>
<a href="admin.php?page=form-builder-create" class="button"><b>Add new +</b></a>
<div class="wrap">
    <div class="tab-content">
        <? $Table->display() ?>
    </div>
</div>
