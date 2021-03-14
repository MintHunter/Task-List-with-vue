<template>
  <v-card
      class="mx-auto"
      width="344"
  >
    <v-card-title>
       {{ task.title }} <v-icon class="col-sm-6"  color="green accent-3" large title="In progress">mdi-arrow-right-bold</v-icon>
    </v-card-title>
    <v-card-subtitle>

      <div class="green--text text--accent-3" >Start task date : {{ task.start_time }} </div>
      <div class="orange--text text--lighten-2">End task date : {{ task.end_time }}</div>

    </v-card-subtitle>
    <v-card-actions>
      <v-btn
          color="orange lighten-2"
          text
      >
        Explore
      </v-btn>
      <v-spacer></v-spacer>
      <v-btn
          icon
          @click="show = !show"
      >
        <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
      </v-btn>
    </v-card-actions>
    <v-expand-transition>
      <div v-show="show">
        <v-divider></v-divider>
        <v-card-text>
          {{ task.text }}
        </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>
</template>

<script>
export default {
  name: 'TaskElement',
  props: {
    task :{

    }
  },
  data: () => ({
    show: false,

  })
}
</script>