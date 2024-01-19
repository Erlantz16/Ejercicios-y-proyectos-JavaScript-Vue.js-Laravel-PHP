<template>
    <div>
      <ul>
        <li v-for="(tarea, index) in tareas" :key="index">
          {{ tarea }}
          <button @click="eliminarTarea(index)">Eliminar</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    name: 'ListaTareas',
    props: {
      tareas: {
        type: Array,
        required: true
      }
    },
    methods: {
      eliminarTarea(index) {
        this.$emit('eliminar-tarea', index);
      }
    }
  };
  </script>