import TaskApi from "../api/task";

export default {
    namespaced: true,
    mutations: {
        taskMessageInAction: (state, message) => {
            state.error = null;
            state.taskArr = message;
            state.isLoading = true;
        },
        getTaskMessageSuccess: (state, message) => {
            state.error = null;
            state.taskArr = message;
            state.isLoading = true;
        },
        getTaskError: (state, error) => {
            state.error = error;
            state.taskArr['error_message'] = "something went wrong";
            state.isLoading = false;
        },
    },
    state: {
        isLoading: false,
        taskArr: [],
        error: null
    },
    getters: {
        getMessage: (state) => {
            return state.taskArr
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