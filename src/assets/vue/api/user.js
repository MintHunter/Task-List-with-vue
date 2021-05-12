import axios from "axios";

export default {
    create(user){
        let bodyUserData = new FormData();
        return axios.post("/api/register",{
            email: user.email,
            password: user.password,
            userNickName: user.nickName,
        });

    },
    auth(user){
        let bodyUserData = new FormData();
        return axios.post("/api/login_check",{
            email: user.email,
            password: user.password,
            userNickName: user.nickName,
        });

    }
}