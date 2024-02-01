<template>
    <table>
        <thead>
            <tr>
                <th>Evento</th>
                <th>Fecha</th>
                <th>Territorio</th>
                <th>Mas Info</th>
                <th>Quitar de favoritos</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(favoritos, index) in favorito" :key="favoritos.documentName">
                <td>{{ favoritos.documentName }}</td>
                <td>{{ favoritos.eventStartDate }}</td>
                <td>{{ favoritos.territory }}</td>
                <td>{{ favoritos.friendlyUrl }}</td>
                <button @click="eliminarFavoritos(index)">Eliminar a favoritos</button>
            </tr>
        </tbody>
    </table>
</template>
<script>
import { mapState, mapActions } from 'pinia'
import { useCounterStore } from '@/stores/counter'
export default {
    name: 'FavoritosView',
    computed: {
        ...mapState(useCounterStore, ['favorito']),
    },
    methods: {
        ...mapActions(useCounterStore, ['eliminar']),
        eliminarFavoritos(index) {
            this.eliminar(index)
        }
    }
}
</script>