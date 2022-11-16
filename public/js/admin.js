const { createApp } = Vue;

const TMP_Blocks = {
  title: {
    type: 'title',
    value: "",
  },
  desc: {
    type: 'desc',
    value: "",
  },
  rating: {
    type: 'rating',
    title: "",
    list: [ "" ],
  },
  text: {
    type: 'text',
    title: "",
    text_type: "email",
  },
  check:{
    type: 'check',
    title: "",
    list: [ "" ],
  },
};

createApp({
  data: () => ({
      title: "заголовок",
      desc: "desc",
      select_type_block: "title",
      blocks: [ { label: "(no label)", show: false, type: 'title', required: false, value: "" } ]
  }),
  methods: {
    deleteBlock(i) {
      if(this.blocks.length < 2) return;

      this.blocks.splice(i, 1);
    },
    copyBlock(i) {
      const block = Object.assign(this.blocks[i], {});

      this.blocks.splice(i, 0, block);
    },
    addBlock() {
      const block = Object.assign(
        TMP_Blocks[ this.select_type_block ], 
        {
          label: "(no label)",
          show: false,
          required: false,
        }
      );

      this.blocks.push( block );
    },

    // Rating ---
    addRatingItem(list) {
      if(list.length > 9) return;

      list.push("");
    },
    deleteRatingItem(list, item) {
      if(list.length < 2) return;

      list.splice(item, 1);
    },

    // Check ---
    addCheckItem(list) {
      if(list.length > 9) return;

      list.push("");
    },
    deleteCheckItem(list, item) {
      if(list.length < 2) return;

      list.splice(item, 1);
    },

    // Button
    saveQuest() {
      console.log(Object.assign(this.blocks, {}));
    },
  },
  mounted () {
    axios
      .get(ajaxurl + "?action=create_form")
      .then(response => console.log(response))
  }
}).mount('#vsfb-builder');