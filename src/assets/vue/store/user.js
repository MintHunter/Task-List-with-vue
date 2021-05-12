import UserApi from "../api/user";

export default {
    namespaced: true,
    mutations: {
        createUser: (state, userData) => {
            state.error = null;
            state.user =userData;
            state.isLoading = true;
        },
        authUser: (state,userData) => {
            state.error = null;
            state.user =userData;
            state.isLoading = true;
        }
    },
    state: {
        isLoading: false,
        user: [],
        error: null,
        message : ''
    },
    getters: {
        getUser: (state) => {
            return state.user
        }
    },
    actions: {
        createUser: async ({commit}, userData) => {
          let response = await UserApi.create(userData)
            commit('createUser', response.data);
        },
        authUser: async ({commit},userData)=>{
            let response = await UserApi.auth(userData)
            commit('authUser', response.data);
        }
    }

}