<?php

?>

<div class="wrap">
    <h1><?= esc_html( get_admin_page_title() ) ?></h1>

    <form action="">
        <table class="form-table" role="presentation">
            <tbody>
                <tr class="form-field form-required">
                    <th scope="row"><label for="title">Title<span class="description"> *</span></label></th>
                    <td><input name="title" type="text" aria-required="true" maxlength="60"></td>
                </tr>
                <tr class="form-field">
                    <th scope="row"><label for="desc">Description<span class="description"></span></label></th>
                    <td><textarea name="desc"></textarea></td>
                </tr>
            </tbody>
        </table>
        <hr>
		
			<div id="health-check-site-status-critical" class="health-check-accordion issues">
                <h4 class="health-check-accordion-heading">
                    <button aria-expanded="false" class="health-check-accordion-trigger" aria-controls="health-check-accordion-block-php_version" type="button">
                        <span class="title">Your site is running an outdated version of PHP (7.3.9), which requires an update</span>
                        <span class="badge blue">Security</span>
                        <span class="icon"></span>
                    </button>
                </h4>
                <div id="health-check-accordion-block-php_version" class="health-check-accordion-panel" hidden="hidden">
                    <p>PHP is the programming language used to build and maintain WordPress. </p>
                </div>
            </div>
        
    </form>

</div>