<template>
    <div>
        <label for="Tarea">Tarea:</label>
        <input type="text" v-model="nuevaTarea">
        <button @click="crear">Crear</button>
        <h2>Lista:</h2>
        <ul v-if="tareas.length > 0">
            <li v-for="tarea in tareas" :key="tarea.id">{{ tarea.texto }}</li>
        </ul>
        <p v-else>No Hay Tareas</p>

    </div>
</template>

<script>
export default {
    name: 'Ejercicio2',
    data() {
        return {
            // sinTareas: 'No hay tareas',
            nuevaTarea: '',
            tareas: []
        }
    },
    methods: {
        crear() {
            
                this.tareas.push({
                    texto: this.nuevaTarea
                });
                this.nuevaTarea = '';
            
        }
    }
}
</script>