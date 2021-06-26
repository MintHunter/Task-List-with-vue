<template>
  <v-card
      class="d-flex flex-column h-100 align-items-center "
      flat
      tile
      color="#121212">
    <h1 class="text-primary text-center"> Auth page</h1>
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

          <ValidationProvider rules="required|:@password" v-slot="{ errors, valid }"
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

          <v-btn
              class="mr-4"
              type="submit"
              :disabled="invalid"
          >
            Log in
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
  name: 'Auth',
  components: {
    ValidationProvider,
    ValidationObserver,
  },

  data: () => ({
    email: 'admin@test.test',
    password: '',

  }),
  computed: {
    ...mapState({
      user: state => state.user,
    }),
  },
  methods: {
    ...mapActions({
      authUser:'user/authUser'
    }),
    submit() {
      this.$refs.observer.validate().then(
          this.authUser({email: this.$data.email, password: this.$data.password,nickName:this.$data.nickName})
              .then(this.user.email = this.$data.email)
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