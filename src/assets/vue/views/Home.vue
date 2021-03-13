<template>
  <div>
    <div class="row col">
      <h1>Homepage</h1>
    </div>

    <div class="row col">
      <p>This is the homepage of our Vue.js application. ___ {{  message }}</p>
    </div>
  </div>
</template>

<script>

import {mapGetters, mapState, mapActions, mapMutations} from 'vuex'

export default {
  name: "Home",
  computed: {
    ...mapState({
      message: state => state.task.data.message
    }),
    ...mapGetters({
      message2: "task/getMessage"
    }),
  },
  methods: {
    ...mapActions({
      getTasks: 'task/getTasks'
    }),
  },
  async mounted() {
     await this.getTasks();
  }

};
</script>