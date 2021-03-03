import PostApi from "../api/post";

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
         getPosts: async (ctx) =>{
            let  message = await PostApi.findAll();
           // let jsonDecode = message.json();
            ctx.commit('updateMessage',message.data);
            return message.data;
        }
    }

}