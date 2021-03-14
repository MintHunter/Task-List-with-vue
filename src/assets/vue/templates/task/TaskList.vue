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
          :task="task"
          :stageId="task.work_stage.stage_id"
          :title="task.title"
          :elementColor="task.work_stage.vuetify_material.dom_element"
          :textColor="task.work_stage.vuetify_material.text"
          :dateColor="task.work_stage.color"
          :stageName="task.work_stage.name"
          :startTime="task.start_time"
          :endTime="task.end_time"
          :diffTime="task.diff_time"

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