const { createApp } = Vue;

const TMP_Blocks = {
  title: {
    type: 'title',
    title: "",
  },
  desc: {
    type: 'desc',
    title: "",
  },
  text: {
    type: 'text',
    title: "",
    text_type: "email",
  },
  rating: {
    type: 'rating',
    title: "",
    list: [ "" ],
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
      blocks: [ { label: "(no label)", show: false, type: 'title', required: 0, title: "" } ]
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
          required: 0,
        }
      );

      this.blocks.push( block );
    },

    // Rating ---
    addRatingItem(list) {
      if(list.length > 4) return;

      list.push("");
    },
    deleteRatingItem(list, item) {
      if(list.length < 2) return;

      list.splice(item, 1);
    },

    // Check ---
    addCheckItem(list) {
      if(list.length > 4) return;

      list.push("");
    },
    deleteCheckItem(list, item) {
      if(list.length < 2) return;

      list.splice(item, 1);
    },

    // Button
    saveQuest() {
      jQuery.ajax({
        method: "POST",
        url: ajaxurl,
        data: {
          action:"create_form",
          quest: { 
            title: Object.assign(this.title, {}),
            desc: Object.assign(this.desc, {}),
          },
          blocks: Object.assign(this.blocks, {}),
        },
        success: res => { console.log(res) }
      })
    },
  },
  beforeMount () {
    jQuery.ajax({
      method: "GET",
      url: ajaxurl,
      data: {
        action:"get_form",
        id: 2,
      },
      success: res => { 
        if( res.status !== "success" ) {
          return alert("Error");
        }
        console.log(res);
        this.title  = res.data.quest.title;
        this.desc   = res.data.quest.desc;
        this.blocks = res.data.blocks.map( i => {
          if(i.type === "rating" || i.type === "check") {
            i.list = [];
            if(i.ask_0) i.list.push(i.ask_0);
            if(i.ask_1) i.list.push(i.ask_1);
            if(i.ask_2) i.list.push(i.ask_2);
            if(i.ask_3) i.list.push(i.ask_3);
            if(i.ask_4) i.list.push(i.ask_4);
          }
          return { show: false, ...i };
        });
        console.log(this);
      }
    })
  }
}).mount('#vsfb-builder');