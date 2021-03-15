<template>
  <validation-observer
      ref="observer"
      v-slot="{ invalid }"
  >
    <form @submit.prevent="submit">

      <validation-provider
          v-slot="{ errors }"
          name="email"
          rules="required|email"
      >
        <v-text-field
            v-model="email"
            :error-messages="errors"
            label="E-mail"
            required
        ></v-text-field>
      </validation-provider>


      <ValidationProvider rules="required|:@password" v-slot="{ errors, valid }" name='new password'>
        <v-text-field
            v-model="password"
            label="New Password"
            type="password"
            :success="valid"
            :error-messages="errors"
        />
      </ValidationProvider>


      <v-btn
          class="mr-4"
          type="submit"
          :disabled="invalid"
      >
        submit
      </v-btn>
      <v-btn @click="clear">
        clear
      </v-btn>
    </form>
  </validation-observer>
</template>

<script>

import { required, digits, email, max, regex } from 'vee-validate/dist/rules'
import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate'



setInteractionMode('eager')

extend('digits', {
  ...digits,
  message: '{_field_} needs to be {length} digits. ({_value_})',
})

extend('required', {
  ...required,
  message: '{_field_} can not be empty',
})

extend('max', {
  ...max,
  message: '{_field_} may not be greater than {length} characters',
})

extend('regex', {
  ...regex,
  message: '{_field_} {_value_} does not match {regex}',
})

extend('email', {
  ...email,
  message: 'Email must be valid',
})

export default {
  name: 'Register',
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  data: () => ({
    email: '',
    password: '',
  }),

  methods: {
    submit () {
      this.$refs.observer.validate()
    },
    clear () {
      this.email = ''
      this.password = ''

      this.$refs.observer.reset()
    },
  },
}
</script>