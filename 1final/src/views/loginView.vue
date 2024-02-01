<template>
    <div>
        <form>
            <label for="name">name: <input v-model="name" name="name" type="text"></label>
            <label for="contrasena">contrasena: <input v-model="contrasena" type="password"></label>
            <button @click="login">login</button>
        </form>
        <p>{{ mensaje }}</p>

    </div>
</template>
  
<script>
import axios from 'axios';
import { useCounterStore } from '@/stores/counter.js'; // Asegúrate de que la ruta de importación es correcta
import { mapActions, mapState} from 'pinia';

export default {
    name: 'loginView',
    data() {
        return {
            name: '',
            contrasena: '',
            usuarios: []
        }
    },
    computed: {
        mensaje() {
            return this.name && this.contrasena ? 'Credenciales incorrectas' : '';
        }
    },
    methods: {

        ...mapActions(useCounterStore, ['añadir']),
        login(event) {
            event.preventDefault();
            // const counterStore = useCounterStore(); // Inicializa el store

            // bucle para recorrer el array de usuarios
            for (let i = 0; i < this.usuarios.length; i++) {
                // condicional para comprobar si el usuario existe
                if (this.usuarios[i].name === this.name) {
                    // condicional para comprobar si la contraseña es correcta
                    if (this.usuarios[i].password === this.contrasena) {
                        // almacenar el nombre del usuario en el store
                        this.añadir(this.usuarios[i].name);
                        this.$router.push('/compras');

                        console.log("login correcto");
                        break;
                    } else {
                        console.log("contraseña incorrecta");
                    }
                }
            }
        }
    },
    // methods: {
    //     login(event) {
    //         event.preventDefault();
    //         // bucle para recorrer el array de usuarios
    //         for (let i = 0; i < this.usuarios.length; i++) {
    //             // condicional para comprobar si el usuario existe
    //             if (this.usuarios[i].name === this.name) {
    //                 // condicional para comprobar si la contraseña es correcta
    //                 if (this.usuarios[i].password === this.contrasena) {
    //                     // almacenar el nombre del usuario en el sessionStorage
                        
    //                     console.log("login correcto");
    //                     break;
    //                 } else {
    //                     console.log("contraseña incorrecta");
    //                 }
    //             }
    //         }
    //     }
    // },
    mounted() {
        axios.get('/public/json/Usuarios.json')
            .then(response => {
                this.usuarios = response.data;
            })
            .catch(error => {
                console.error(error);
            });
    }
}
</script>