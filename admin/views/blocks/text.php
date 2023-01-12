<div class="block-text flex fd-c">
    <label>
        <p>Field Label</p>
        <input type="text" v-model="block.label">
    </label>
    <label>
        <p>Field Question <sup>*</sup></p>
        <input type="text" v-model="block.title">
    </label>
    <label>
        <p>Field Type</p>
        <select v-model="block.text_type">   
            <option value="text">Text</option>
            <option value="phone">Phone</option>
            <option value="email">Email</option>
        </select>
    </label>
</div>