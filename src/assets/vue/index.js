import Vue from "vue";
import App from "./App";
import router from "./router";
import store from "./store"
import vuetify from "../vuetify"

new Vue({
    components: { App },
    template: "<App/>",
    router,
    store,vuetify
}).$mount("#app");