<div class="block-text">
    <table class="form-table" role="presentation">
        <tbody>
            <tr class="form-field form-required">
                <th scope="row"><label for="title">Question<span class="description"> *</span></label></th>
                <td><input type="text" v-model="block.title"></td>
            </tr>
            <tr class="form-field form-required">
                <th scope="row"><label for="title">Type<span class="description"> *</span></label></th>
                <td>
                    <select style="margin:10px 15px" v-model="block.text_type">   
                        <option value="text">Text</option>
                        <option value="phone">Phone</option>
                        <option value="email">Email</option>
                    </select>
                </td>
            </tr>
        </tbody>
    </table>
</div>