<template>
    <p>Kaixo</p>
    <input type="number" @keyup="keyup()" @mousemove="mostrarCoordenadas($event)" v-model="numero"><button
        @click="sumar()">sumar +2</button>
    <p>Coordenadas: {{ coordenadas }}</p>
</template>
<script>
export default {
    name: 'Ejercicio1', 
    data() {
        return {
            numero: 0,
            coordenadas: { x: 0, y: 0 }
        }
    },
    methods: {
        sumar() {
            this.numero += 2
        },
        mostrarCoordenadas(event) {
            this.coordenadas.x = event.clientX;
            this.coordenadas.y = event.clientY;
        },
        keyup() {
            this.numero +=2;
        }
    }
}
</script>
