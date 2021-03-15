<template>
  <v-card
      class="mx-auto"
      width="344"
  >
    <v-card-title :class="textColor">
      {{ title }}
      <v-icon class="col-sm-6 " :color="elementColor" small
              :title="stageName">
        {{ stageName }}
      </v-icon>
    </v-card-title>
    <v-card-subtitle>

      <div >Start task date : {{ startTime }}</div>


      <div  :style=" {color : dateColor}" >End task date : {{ endTime }}  </div>


    </v-card-subtitle>
    <v-card-actions>
      <v-btn
          color="yellow darken-1"
          text
      >
        More
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
  props: [
    'stageId',
    'task',
    'title',
    'elementColor',
    'textColor',
    'stageName',
    'startTime',
    'endTime',
    'diffTime',
    'dateColor',

  ],
  data: () => ({
    show: false,
  })
}
</script>