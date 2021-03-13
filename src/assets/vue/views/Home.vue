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
    <v-card
        class="d-flex justify-center mb-6"
        flat
        tile
        color="#121212"
    >
      <v-card
          v-if="!Array.isArray(taskArr)"
          class="pa-2"
          outlined
          tile
      >
        {{ taskArr }}
      </v-card>
      <v-card
          v-else
          v-for="task in taskArr"
          :key="task.id"
          class="pa-2 mr-6"
          outlined
          tile
      >
        <v-card
            class="mx-auto"
            width="344"
        >
          <v-card-title>
            {{ task.title }}
          </v-card-title>
          <v-card-subtitle>
            <div>start task date {{ task.start_time }}</div>
            <div>end task date {{ task.end_time }}</div>

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
      </v-card>
    </v-card>
  </div>
</template>

<script>

import {mapGetters, mapState, mapActions, mapMutations} from 'vuex'

export default {
  name: "Home",
  data: () => ({
    show: false,
  }),
  computed: {
    ...mapState({
      taskArr: state => state.task.taskArr
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
    this.show = await this.getTasks();
  }

};
</script>