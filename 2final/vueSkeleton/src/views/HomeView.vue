<script>
import TheWelcome from '../components/TheWelcome.vue'
import { mapState, mapActions } from 'pinia'
//como tal para recoger datos este de abajo no haria falta, lo pongo por si acaso
import {useCounterStore} from '@/stores/counter'
export default{
  name: 'HomeView',
  computed: {
    ...mapState(useCounterStore, ['favorito']),
  },
}
</script>

<template>

  
  <main>
    <ul v-for="favoritos in favorito">
      <li>{{favoritos.documentName}}</li>
    </ul>
    <TheWelcome />
  </main>
</template>
