<template>
  <div>
    <v-card
        class="d-flex justify-center mb-6"
        flat
        tile
        color="#121212"
    >
      <h1> Home page</h1>

    </v-card>
    <task-list
    v-bind:taskArr ='taskArr'
    v-bind:message ='message'
    />
  </div>
</template>

<script>

import { mapState, mapActions} from 'vuex'
import TaskList from "../templates/task/TaskList";
export default {
  name: "Home",
  components : {
    TaskList
  },
  computed: {
    ...mapState({
      taskArr: state => state.task.taskArr,
      message: state => state.task.message
    }),
  },
  methods: {
    ...mapActions({
      getTasks: 'task/getTasks'
    }),

  },
  async mounted() {
    this.show = await this.getTasks();
  }

};
</script>