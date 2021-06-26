import axios from "axios";

export default {
    create(user){
        return axios.post("/api/register",{
            email: user.email,
            password: user.password,
            userNickName: user.nickName,
        });

    },
    auth(user){
        return axios.post("/api/login_check",{
            username: user.email,  //i set email in package but it sill not working for some reason
            password: user.password,
        });

    }
}