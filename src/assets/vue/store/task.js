import TaskApi from "../api/task";

export default {
    namespaced:true,
    mutations: {
        taskMessageInAction: (state,message)=>{
            state.data.error = null;
            state.data.message = message;
            state.data.isLoading  = true;
        },
        getTaskMessageSuccess: (state , message) => {
            state.data.error = null;
            state.data.message = message;
            state.data.isLoading  = true;
        },
        getTaskError: (state , error) => {
            state.data.error = error;
            state.data.message = "something went wrong";
            state.data.isLoading  = false;
        },
    },
    state:{
       data: {
           isLoading : false,
           message:  [],
           error: null
       }
    },
    getters: {
        getMessage: (state)=> {
            return state.data.message
        }
    },
    actions:{
         getTasks: async ({commit}) =>{
             commit('taskMessageInAction', 'Loading...');
             try {
                 let  message = await TaskApi.findAll();
                 commit('getTaskMessageSuccess',message.data);
                 return message.data;
             }catch (e){
                 commit('getTaskError',e);
                 return e;
             }

        }
    }

}