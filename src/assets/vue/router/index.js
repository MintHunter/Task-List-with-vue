import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home";
import Register from "../views/Register";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Home },
        { path: "/register", component: Register },
        { path: "*", redirect: "/" }
    ]
});