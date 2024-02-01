<template>
    <div>

        <select v-model="selectedPlace">
            <option value="">Cualquiera</option>
            <option v-for="(place, index) in sitios" :key="index" :value="place">
            {{ place }}
        </option>
        </select>
    <!-- Las opciones select mes para realizar el filtrado son: Elige una opción (por defecto), Enero, febrero, marzo….. Si seleccionamos “Todos” se mostrarán los eventos de todos los meses, al seleccionar “Enero” se mostrarán los de enero, “febrero” → febrero…. -->
    <select v-model="selectedMonth">
        <option value="">Cualquiera</option>
        <option v-for="(month, index) in months" :key="index" :value="month">
            {{ month }}
        </option>
    </select>
   
 <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Type</th>
          
        </tr>
      </thead>
      <tbody>
        <tr v-for="(dato, index) in filteredMonth" :key="dato.name" :class="{ 'bizkaia': dato.territory === 'Bizkaia', 'gipuzkoa': dato.territory === 'Gipuzkoa', 'araba': dato.territory === 'Araba', 'araba-bizkaia-gipuzkoa': dato.territory ==='Araba Bizkaia Gipuzkoa' ,'bizkaia-araba-gipuzkoa': dato.territory ==='Bizkaia Araba Gipuzkoa'}">
          <td>{{ dato.documentName }}</td>
          <td>{{ dato.eventStartDate }}</td>

          <td>{{ dato.territory }}</td>
          <td>{{ dato.documentDescription }}</td>
          <!-- <td>{{ dato.ability }}</td> -->
          <td>{{dato.friendlyUrl}}</td>
          <button @click="añadirFavorito(index)" >Añadir a favoritos</button>
        </tr>
      </tbody>
    </table>
</div>
<div>
    <ul v-for="favoritos in favorito">
        <li>{{favoritos.documentName}}</li>
    </ul>
</div>
</template>
<script>
import axios from 'axios';
import { mapState, mapActions } from 'pinia'
import {useCounterStore} from '@/stores/counter'
export default {
  name: 'TurismoView',
  data () {
    return {
        turismo: [],
        selectedMonth: '',
        selectedPlace: '',
        sitios: ['Bizkaia', 'Gipuzkoa', 'Araba'],
        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        
    }
  },
  methods: {
    ...mapActions(useCounterStore, ['añadir']),
    añadirFavorito(index){
        let añade = true
        for(let i = 0; i < this.favorito.length; i++){
            if(this.favorito[i].documentName == this.turismo[index].documentName){
                 añade = false;
               alert("Ya esta en favoritos");
            }
        }
        if(añade){
            this.añadir(this.turismo[index])
        }
            // this.$store.commit('añadirFavorito', this.filteredMonth[index]);
    }
  },
  computed: {
    ...mapState(useCounterStore, ['favorito']),
    // sitios() {
    //   return [...new Set(this.turismo.map((dato) => dato.territory))];

    // },
    
    filteredMonth() {
        return this.turismo
            .filter(dato => {
                // if (this.selectedMonth === '') {
                //     return true;
                // } else {
                //     let date = new Date(dato.eventStartDate.split('/').reverse().join('-'));
                //     let monthIndex = this.months.indexOf(this.selectedMonth);
                //     return date.getMonth() === monthIndex;
                // }


                if (this.selectedMonth === ''){
                    //return this.turismo;
                    return true;
                }else{
                    let mes = dato.eventStartDate.split('/')[1];
                    let mesIndex = this.months.indexOf(this.selectedMonth);
                    return mes == mesIndex;

                }
            })
            .filter(dato => {
                if (this.selectedPlace === '') {
                    return this.turismo;
                } else {
                    return dato.territory.includes(this.selectedPlace);
                    // return dato.territory === this.selectedPlace;
                }
            });

    },  
  },
  mounted () {
    axios
        .get('/json/agenda.json')
        .then(response => {
            this.turismo = response.data
        })
        .catch(error => {
            console.error(error)
        })
    
  }
  
}
</script>

<style>

.bizkaia {
    background-color: green;
}

.gipuzkoa {
    background-color: brown;
}

.araba {
    background-color: red;
}
.araba-bizkaia-gipuzkoa {
    background-color: grey;
}
.bizkaia-araba-gipuzkoa {
    background-color: purple;
}
</style>