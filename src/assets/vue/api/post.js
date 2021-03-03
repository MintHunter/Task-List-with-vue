import axios from "axios";

export default {
    create(message){
        return axios.post("/",{
            message:message
        });
    },
    findAll(){
        return axios.get("/getPost");
    }
}