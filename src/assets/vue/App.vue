<template>
  <v-app>
    <v-navigation-drawer app>
      <!-- -->
    </v-navigation-drawer>

    <v-app-bar app>
      <router-link
          class="navbar-brand"
          to="/"
      >
        App
      </router-link>
      <router-link
          class="navbar-brand"
          to="/"
      >
        Home
      </router-link>
      <router-link
          class="navbar-brand"
          to="/register"
      >
       Register
      </router-link>
    </v-app-bar>

    <!-- Sizes your content based upon application components -->
    <v-main>

      <!-- Provides the application the proper gutter -->
      <v-container fluid>

        <!-- If using vue-router -->
        <router-view></router-view>
      </v-container>
    </v-main>

    <v-footer app>
      <!-- -->
    </v-footer>
  </v-app>
</template>

<script>
export default {
  name: "App",
}
</script>