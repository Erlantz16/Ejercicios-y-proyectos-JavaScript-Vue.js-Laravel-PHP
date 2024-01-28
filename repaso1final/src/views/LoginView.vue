<template>
    <div>
        <h1>Login</h1>
        <input type="text" v-model="user.name" placeholder="Name" />
        <input type="text" v-model="user.password" placeholder="Password" />
        <button @click="login">Login</button>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'LoginView',
    data() {
        return {
            user: {
                name: '',
                password: ''
            }
        };
    },
    mounted() {
            axios
            .get("public/json/Usuarios.json")
               .then((response) => {
                   this.user = response.data;
                   console.log(this.user);
               })
                .catch((error) => {
                     console.error(error);
                });
    },
    methods: {
        login(event) {
            event.preventDefault();
            for (let i = 0; i < this.user.length; i++) {
                if (this.user[i].name === this.user.name) {
                    if (this.user[i].password === this.user.password) {
                        sessionStorage.setItem('user', this.user[i].name);
                        window.location.href = '/comprasview';
                        console.log("login correcto");
                        break;
                    } else {
                        console.log("contraseña incorrecta");
                    }
                }
            }
         
        }
    }
};
</script>