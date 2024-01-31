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
        //funcion para comprobar que los datos del formulario coinciden con algun usuario del json y me lleve a comprasview
       login(event){
        event.preventDefault();
        if(this.user.name == this.user.name && this.user.password == this.user.password){
            sessionStorage.setItem('user', this.user.name);
            window.alert("Bienvenido " + this.user.name);
            window.location.href = '/comprasview';
        }else{
            window.alert("Usuario o contraseña incorrectos");
        }
       }
    }
};
</script>