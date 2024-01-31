<template>
  <div>
    <select v-model="selectedType">
      <option value="">All</option>
      <option v-for="type in uniqueTypes" :value="type">{{ type }}</option>
    </select>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Type</th>
          <th>Ability</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(pokemon, index) in filteredPokemons" :key="pokemon.name">
          <td>{{ pokemon.name }}</td>
          <td>{{ pokemon.type }}</td>
          <td>{{ pokemon.ability }}</td>
          <td>
            <button @click="deletePokemon(index)">Delete</button>
          </td>x 
        </tr>
      </tbody>
    </table>

    <input type="text" v-model="newPokemon.name" placeholder="Name" />
    <input type="text" v-model="newPokemon.type" placeholder="Type" />
    <input type="text" v-model="newPokemon.ability" placeholder="Ability" />
    <button @click="addPokemon">Add</button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      pokemons: [],
      selectedType: "",
    };
  },
  created() {
    axios
      .get("/pokemons.json")
      .then((response) => {
        this.pokemons = response.data.results;
      })
      .catch((error) => {
        console.error(error);
      });
  },
  computed: {
    uniqueTypes() {
      return [...new Set(this.pokemons.map((pokemon) => pokemon.type))];
    },
    filteredPokemons() {
      if (this.selectedType === "") {
        return this.pokemons;
      } else {
        return this.pokemons.filter(
          (pokemon) => pokemon.type === this.selectedType
        );
      }
    },
  },
  methods: {
    deletePokemon(index) {
      this.pokemons.splice(index, 1);
    },
    addPokemon() {
      this.pokemons.push(this.newPokemon);
      this.newPokemon = {
        name: "",
        type: "",
        ability: "",
      };
    },
  },
};
</script>