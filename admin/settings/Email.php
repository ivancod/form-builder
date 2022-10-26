<?php

/**
 * VSFB_Email class will create the page to load the table
 */

class VSFB_Email
{
    /**
     * Get the table data
     *
     * @return String
     */

    public function view()
    { ?>
        <form>
            <table class='form-table' role='presentation'>
                <tbody>
                    <tr class='form-field'>
                        <th scope='row'><label for='email'>E-mail</label></th>
                        <td><input name='email' type='email'></td>
                    </tr>
                    <tr class='form-field'>
                        <th scope='row'><label for='notification_email'>Send notifications on E-mail</label></th>
                        <td><input name='notification_email' type='checkbox'></td>
                    </tr>
                </tbody>
            </table>
            <hr>
        </form>
    <? }
}