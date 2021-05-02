import Vue from 'vue';
import Vuex from 'vuex';
import TaskModule from "./task";
import UserModule from './user'


Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        task: TaskModule,
        user: UserModule,
    }
});