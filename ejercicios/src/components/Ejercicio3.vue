<template>
    <div>
      <button @click="iniciarCuentaAtras(2)">2seg</button>
      <button @click="iniciarCuentaAtras(5)">5seg</button>
      <button @click="iniciarCuentaAtras(55)">55seg</button>
      <button @click="iniciarCuentaAtras(89)">89seg</button>
      <p>{{ cuentaAtras }}</p>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Ejercicio3',
    data() {
      return {
        cuentaAtras: 0,
        intervalId: null
      };
    },
    methods: {
      iniciarCuentaAtras(segundos) {
        clearInterval(this.intervalId);
        this.cuentaAtras = segundos;
        this.intervalId = setInterval(() => {
          this.cuentaAtras--;
          if (this.cuentaAtras === 0) {
            clearInterval(this.intervalId);
          }
        }, 1000);
      }
    }
  };
  </script>