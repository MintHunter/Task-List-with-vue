<template>
  <v-card
      class="d-flex justify-center mb-6"
      flat
      tile
      color="#121212"
  >
    {{ message }}
    <v-card
        v-for="task in taskArr"
        :key="task.id"
        color="#121212"
        class="pa-2 mr-6"
        outlined
        tile
    >
      <task-element
          v-bind:task="task"
      />
    </v-card>
  </v-card>
</template>

<script>
import TaskElement from "./TaskElement";
export default {
  name: 'TaskList',
  components: {
    TaskElement
  },
  props: {
    taskArr:{},
    message:{}
  },
}
</script>