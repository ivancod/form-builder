<form action="" method="post">
    <table class='form-table' role='presentation'>
        <tbody>
            <tr class='form-field'>
                <th scope='row'><label for='email'>E-mail</label></th>
                <td><input name='form[email]' type='email' value="<?= $data['email']?>"></td>
            </tr>
            <tr class='form-field'>
                <th scope='row'><label for='notification_email'>Send notifications on E-mail</label></th>
                <td><input name='form[email_notify]' type='checkbox' checked="<?= $data['email_notify']?>" value="1"></td>
            </tr>
        </tbody>
    </table>
    <button name='save_settings' value="1" class='button button-primary'>Save</button>
</form>
