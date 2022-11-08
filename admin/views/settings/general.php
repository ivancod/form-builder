<form>
    <table class='form-table' role='presentation'>
        <tbody>
            <tr class='form-field form-required'>
                <th scope='row'><label for='title'>Title<span class='description'> *</span></label></th>
                <td><input name='title' type='text' aria-required='true' maxlength='60'></td>
            </tr>
            <tr class='form-field'>
                <th scope='row'><label for='desc'>Description<span class='description'></span></label></th>
                <td><textarea name='desc'></textarea></td>
            </tr>
            <tr class='form-field'>
                <th scope='row'><label for='default_category'>Type<span class='description'></span></label></th>
                <td>
                    <select name='default_category' id='default_category' class='postform'>
                        <option class='level-0' value='1' selected='selected'>Без рубрики</option>
                        <option class='level-1' value='2'>Без рубрики 2</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
</form>
<form>
    <table class='form-table' role='presentation'>
        <tbody>
            <tr class='form-field'>
                <th scope='row'><button name='update_db' class='button button-primary' onclick='confirm('Are you sure?')'>Update DB</button></th>
                <td> Після цього база данних обновиться!</td>
            </tr>
        </tbody>
    </table>
</form>