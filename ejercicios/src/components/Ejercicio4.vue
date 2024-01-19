<template>
  <div>
    <!-- Campo de texto para ingresar una nueva tarea -->
    <input type="text" v-model="nuevaTarea">
    <!-- Botón para agregar una nueva tarea -->
    <button @click="agregarTarea">Crear</button>

    <div v-if="tareas.length > 0">
      <!-- Componente ListaTareas para mostrar la lista de tareas -->
      <lista-tareas :tareas="tareas" @eliminar-tarea="eliminarTarea"></lista-tareas>
    </div>
  </div>
</template>

<script>
import ListaTareas from './ListaTareas.vue';

export default {
  // Nombre del componente
  name: 'Ejercicio4',
  // Componentes utilizados en este componente
  components: {
    ListaTareas
  },
  // Datos del componente
  data() {
    return {
      nuevaTarea: '', // Propiedad para almacenar la nueva tarea ingresada
      tareas: [] // Matriz para almacenar las tareas
    };
  },
  // Métodos del componente
  methods: {
    // Método para agregar una nueva tarea a la lista
    agregarTarea() {
      if (this.nuevaTarea.trim() !== '') {
        // Agregar la nueva tarea a la matriz de tareas
        this.tareas.push(this.nuevaTarea);
        // Restablecer la propiedad nuevaTarea a una cadena vacía
        this.nuevaTarea = '';
      }
    },
    // Método para eliminar una tarea de la lista
    eliminarTarea(index) {
      // Eliminar la tarea correspondiente al índice proporcionado de la matriz de tareas
      this.tareas.splice(index, 1);
    }
  }
};
</script>