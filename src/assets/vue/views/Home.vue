<template>
  <div>
    <div class="row col">
      <h1>Homepage</h1>
    </div>

    <div class="row col">
      <p>This is the homepage of our Vue.js application. ___ {{ message2}}</p>
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
      message2: "task/getMessage"
    }),

  },
  methods: {
    ...mapActions({
      getPost: 'task/getTasks'
    }),
  },
  async mounted() {
    await this.getPost();
  }

};
</script>