import TaskApi from "../api/task";

export default {
    namespaced:true,
    mutations: {
        updateMessage: (state,message)=>{
            state.message = message;
        }
    },
    state:{
       message: ""
    },
    getters: {
        getMessage: (state)=> {
            return state.message
        }
    },
    actions:{
         getTasks: async (ctx) =>{
            let  message = await TaskApi.findAll();
           // let jsonDecode = message.json();
            ctx.commit('updateMessage',message.data);
            return message.data;
        }
    }

}