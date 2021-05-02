import axios from "axios";

export default {
    create(user){
        return axios.post("/Api/register",{
            userName: user.email,
            userPass: user.password,
        });

    },
    findAll(){
        return axios.get("/Api/getTasks");
    }
}