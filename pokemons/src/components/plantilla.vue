<template>
<h1>asdfasdf</h1>
<Pokemon />
</template>
<script>
import Pokemon from '@/components/Pokemon.vue'
 export default {
    name : 'plantilla',
   
    data(){
        return{
            nombre: "hola"
        }
    },
    components:{
    Pokemon
}
 }
</script>