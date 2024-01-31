<template>
<a href="aaa">aaaa</a>
    <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Ability</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(turismo, index) in arrayTurismo" :key="turismo.name">
            <td>{{ pokemon.name }}</td>
            <td>{{ pokemon.type }}</td>
            <td>{{ pokemon.ability }}</td>
            <td>
              <!-- <button @click="deletePokemon(index)">Delete</button> -->
            </td>x 
          </tr>
        </tbody>
      </table>

</template>
<script>
export default {
    name: 'TurismoView',
    data() {
        return {
            arrayTurismo: [],
            selectedType: "",
        }
    },
    created() {
        axios.get('/json/turismo.json')
            .then(response => {
                this.arrayTurismo = response.data;
            })
            .catch(error => {
                console.error(error);
            });
    },
    computed: {
       
    },
    methods: {
     
    },
};
</script>