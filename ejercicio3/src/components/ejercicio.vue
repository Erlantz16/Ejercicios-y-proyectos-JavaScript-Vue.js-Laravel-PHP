<template>
  <h1>Aqui montamos el examen</h1>
  <h2>Examen minimos 2DW3D</h2>
  <div>
    <label for="nombre">Nombre: </label>
    <input v-model="persona.nombre" @blur="comprobarNombre" name="nombre" type="text" /><br />
    <label for="email">Email: </label>
    <input v-model="persona.email" @blur="comprobarEmail" name="email" type="email" /><br />
    <p v-if="!comrpEmail && emailValidado">Email incorrecto</p>
    <label for="password">Password: </label>
    <input v-model="persona.password" @keyup="comprobarContrasena" name="password" type="password" /><br />
    <p v-if="!comprPassword && passwordValidado">Contraseña incorrecta</p>
    <p v-if="!comprNombre && nombreValidado">Nombre incorrecto</p>
    <button v-if="comprPassword && comrpEmail && comprNombre" @click="añadir()">Añadir</button>
  </div>
  <ul>
    <li v-for="(persona, index) in personas" :key="index">
      <strong>Nombre:</strong>
      <p v-if="!editando">{{ persona.nombre }}</p>
      <input v-else v-model="persona.nombre" type="text" />
      
      <strong>Email:</strong>
      <p v-if="!editando">{{ persona.email }}</p>
      <input v-else v-model="persona.email" type="text" />
      
      <strong>Password:</strong>
      <p v-if="!editando">{{ persona.password }}</p>
      <input v-else v-model="persona.password" type="text" />

      <button @click="eliminar(index)">Eliminar</button>
      <button v-if="!editando" @click="activarEdicion">activarEdicion</button>
      <button v-else @click="activarEdicion">desactivarEdicion</button>
    </li>
  </ul>
</template>
<script>
export default {
  name: "ejercicio",
  data() {
    return {
      comrpEmail: false,
      comprPassword: false,
      comprNombre: false,
      editando: false,


      persona: {
        nombre: "",
        email: "",
        password: "",
      },
      personas: [],
    };
  },
  computed: {

  },
  methods: {
    activarEdicion() {
      this.editando = !this.editando;

    },
    comprobarEmail() {
      const emailRegExr = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      this.comrpEmail = emailRegExr.test(this.persona.email);
      this.emailValidado = true;
    },
    comprobarContrasena() {
      const passwordRegExr = /^.{8,}$/;
      this.comprPassword = passwordRegExr.test(this.persona.password);
      this.passwordValidado = true;
    },
    comprobarNombre() {
      this.comprNombre = this.persona.nombre.trim() !== "";
      this.nombreValidado = true;
    },
    añadir() {

      this.personas.push(this.persona);
      this.persona = {
        nombre: "",
        email: "",
        password: "",
      };
      document.getElementsByTagName("button")[0].style.display = "none";


    },
    eliminar(index) {
      this.personas.splice(index, 1);
    }
  },

};
</script>
