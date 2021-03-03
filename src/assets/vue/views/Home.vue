<template>
  <div>
    <div class="row col">
      <h1>Homepage</h1>
    </div>

    <div class="row col">
      <p>This is the homepage of our Vue.js application. ___ {{ message.message}}</p>
    </div>
  </div>
</template>

<script>

import {mapGetters, mapState, mapActions, mapMutations} from 'vuex'

export default {
  name: "Home",
  computed: {
    ...mapState({
      message: state => state.post.message
    }),
    ...mapGetters({
      message2: "post/getMessage"
    }),

  },
  methods: {
    ...mapActions({
      getPost: 'post/getPosts'
    }),
  },
  async mounted() {
    await this.getPost();
  }

};
</script>