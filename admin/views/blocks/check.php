<div class="block-check">
    <table class="form-table" role="presentation">
        <tbody>
            <tr class="form-field form-required">
                <th scope="row"><label for="title">Question<span class="description"> *</span></label></th>
                <td><input type="text" v-model="block.title"></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <ul class="check-list">
        <li class="flex" v-for="(item, index) in block.list">
            <p class="check-item-title flex">
                <b>{{index + 1}}. </b>
                <input type="text" v-model="block.list[index]">
            </p>
            <span class="check-item-icons">
                <span class="dashicons dashicons-trash" @click="deleteCheckItem(block.list, index)"></span>
            </span>
        </li>
    </ul>
    <div class="flex">
        <div @click="addCheckItem(block.list)" class="button button-primary check-add-item">
            Add item
            <span class="dashicons dashicons-plus-alt"></span>
        </div>
    </div>
</div>