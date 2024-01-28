<template>
  <div>
    <!-- Dropdown para seleccionar tipo -->
    <select v-model="selectedType">
      <option value="all">All</option>
      <option @click="" v-for="type in uniqueTypes" :key="type">{{ type }}</option>
    </select>

    <!-- Tabla para mostrar los pokemons -->
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Type</th>
          <th>Ability</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Fila para cada pokemon -->
        <tr v-for="(pokemon, index) in filteredPokemons" :key="pokemon.name">
          <td>{{ pokemon.name }}</td>
          <td>{{ pokemon.type }}</td>
          <td>{{ pokemon.ability }}</td>
          <!-- Botón para eliminar pokemon -->
          <td><button @click="eliminarPokemon(index)">Eliminar</button></td>
        </tr>
      </tbody>
    <input type="text" v-model="pokemons.name" placeholder="Name" />
    <input type="text" v-model="pokemons.type" placeholder="Type" />
    <input type="text" v-model="pokemons.ability" placeholder="Ability" />
    <button @click="addPokemon">Add</button>
    </table>
   
  </div>
</template>

<script>
// Importar axios
import axios from 'axios';
// Exportar componente
export default {
  name: 'Pokemon',
  data() {
    return {
      // Lista de pokemons
      pokemons: [],
      // Tipo seleccionado
      selectedType: 'all'
    };
  },
  computed: {
    // Obtener tipos únicos de pokemons
    uniqueTypes() {
      return [...new Set(this.pokemons.map(pokemon => pokemon.type))];
    },
    // Filtrar pokemons basado en tipo seleccionado
    filteredPokemons() {
      if (this.selectedType === 'all') {
        return this.pokemons;
      } else {
// Filtra la lista de pokémons para mostrar solo aquellos cuyo tipo coincida con el tipo seleccionado en el dropdown.
// Utiliza el método filter() en this.pokemons para crear un nuevo array que contenga solo los pokémons cuyo tipo (pokemon.type) sea igual al tipo seleccionado (this.selectedType).
return this.pokemons.filter(pokemon => pokemon.type === this.selectedType);
      }
    }
  },
  mounted() {
    // Cargar datos de pokemons al montar el componente
    axios.get('/pokemons.json')
      .then(response => {
        this.pokemons = response.data.results;
      })
      .catch(error => {
        console.error(error);
      });
  },
  methods: {
    // Agregar nuevo pokemon
    addPokemon() {
      // Agregar nuevo pokemon al array de pokemons
      this.pokemons.push({
        // Utiliza los datos ingresados en los inputs para crear un nuevo objeto pokemon y agregarlo a la lista de pokémons.
        name: this.pokemons.name,
        type: this.pokemons.type,
        ability: this.pokemons.ability
      });
    },
    // Eliminar pokemon por índice
    eliminarPokemon(index) {
      this.pokemons.splice(index, 1);
    }
  }
};
</script>
