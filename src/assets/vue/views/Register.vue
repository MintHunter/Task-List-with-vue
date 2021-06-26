<template>
  <v-card
      class="d-flex flex-column h-100 align-items-center "
      flat
      tile
      color="#121212">
    <h1 class="text-primary text-center"> Registration page</h1>
    <div class="d-flex h-100 align-items-center">
      <validation-observer
          ref="observer"
          v-slot="{ invalid }"
      >
        <form @submit.prevent="submit">

          <validation-provider
              v-slot="{ errors,valid }"
              name="email"
              rules="required|email"
          >
            <v-text-field
                v-model="email"
                :error-messages="errors"
                :success="valid"
                label="E-mail"
                required
            ></v-text-field>
          </validation-provider>

          <validation-provider
              v-slot="{ errors,valid }"
              name="nickName"
              rules="required"
          >
            <v-text-field
                v-model="nickName"
                :error-messages="errors"
                label="Your Nickname"
                :success="valid"

            ></v-text-field>
          </validation-provider>

          <ValidationProvider rules="required|:@password|confirmed:confirmation" v-slot="{ errors, valid }"
                              name='password'>
            <v-text-field
                v-model="password"
                ref="password"
                label="Your Password"
                type="password"
                :success="valid"
                :error-messages="errors"
            />
          </ValidationProvider>

          <ValidationProvider rules=":@password" v-slot="{ errors  }" name='confirmation'
                              vid="confirmation">
            <v-text-field
                v-model="confirmation"
                label="Repeat your Password"
                type="password"
                :error-messages="errors"
                :success="confirmation.length>0 &&confirmation===password"

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
    </div>
  </v-card>
</template>

<script>

import {required, digits, email, max, regex, confirmed,} from 'vee-validate/dist/rules'
import {extend, ValidationObserver, ValidationProvider, setInteractionMode} from 'vee-validate'
import {mapState, mapActions} from 'vuex'


setInteractionMode('eager')

extend('digits', {
  ...digits,
  message: '{_field_} needs to be {length} digits. ({_value_})',
})

extend('required', {
  ...required,
  message: 'this field can not be empty',
})

extend('confirmed', {
  ...confirmed,
  message: 'Passwords must be the same ',
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
    email: 'e-mail',
    password: '',
    nickName: '',
    confirmation: '',

  }),
  methods: {
    ...mapActions({
      createUser: 'user/createUser',
    }),
    submit() {
      this.$refs.observer.validate().then(
          this.createUser({email: this.$data.email, password: this.$data.password,nickName:this.$data.nickName})
      );
    },
    clear() {
      this.email = ''
      this.password = ''
      this.$refs.observer.reset()
    },
  },
}
</script>