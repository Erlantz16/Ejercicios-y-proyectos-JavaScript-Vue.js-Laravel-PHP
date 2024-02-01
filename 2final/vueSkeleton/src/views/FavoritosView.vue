<template>
    <div>
        <ul v-for="favoritos in favorito">
            <li>{{favoritos.documentName}}</li>
        </ul>
    </div>
</template>
<script>
import { mapState, mapActions } from 'pinia'
import {useCounterStore} from '@/stores/counter'
export default{
    name: 'FavoritosView',
    computed: {
        ...mapState(useCounterStore, ['favorito']),
    },
}
</script>