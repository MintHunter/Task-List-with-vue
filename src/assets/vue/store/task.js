import TaskApi from "../api/task";

export default {
    namespaced: true,
    mutations: {
        taskMessageInAction: (state, message) => {
            state.error = null;
            state.message = message;
            state.isLoading = true;
        },
        getTaskMessageSuccess: (state, message) => {
            state.error = null;
            state.taskArr = message;
            state.isLoading = true;
            state.message = '';
        },
        getTaskError: (state, error) => {
            state.error = error;
            state.message = error;
            state.isLoading = false;
        },
    },
    state: {
        isLoading: false,
        taskArr: [],
        error: null,
        message : ''
    },
    getters: {
        getMessage: (state) => {
            return state.message
        }
    },
    actions: {
        getTasks: async ({commit}) => {
            commit('taskMessageInAction', 'Loading...');
            try {
                let message = await TaskApi.findAll();
                commit('getTaskMessageSuccess', message.data);
                return message.data;
            } catch (e) {
                commit('getTaskError', e);
                return e;
            }

        }
    }

}