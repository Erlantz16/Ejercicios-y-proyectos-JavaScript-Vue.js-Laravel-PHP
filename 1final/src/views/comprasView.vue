<template>
  <div>
      <p> Compra de : {{ nombreInicioSesion }}</p>
    <div class="productos">
      <h2>Productos</h2>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Precio</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(producto, index) in productos" :key="index">
            <td>{{ producto.title }}</td>
            <td>{{ producto.description }}</td>
            <td>{{ producto.price }}</td>
            <td>{{ producto.stock }}</td>

            <td><button @click="añadirAlCarrito(index)">Añadir</button></td>
          </tr>
        </tbody>
      </table>
    </div>
    -----------------------------------------------------------------

    <div>
      <h2>Carrito</h2>
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Unidades Compradas</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(producto, index) in carrito" :key="index">
            <td>{{ producto.title }}</td>
            <td>{{ producto.price }}</td>

            <td>{{ producto.unidadesCompradas }}</td>
          </tr>

        </tbody>
        Total: {{ totalPrice }}

      </table>
    </div>
  </div>


  <div class="cantidad">



  </div>
</template>
  
<script>
import axios from 'axios';
import { useCounterStore } from '@/stores/counter.js'; // Asegúrate de que la ruta de importación es correcta
import { mapActions, mapState } from 'pinia';

export default {
  name: 'comprasView',
  data() {
    return {
      productos: [],
      carrito: [],
      usuarioentrante: '',
      nombreInicioSesion: '',
    };
  },
  computed : {
    ...mapState(useCounterStore, ['nombreUsuario']),
    nombreInicioSesion(){
      if (this.nombreUsuario == '') {
        this.nombreInicioSesion = 'Invitado';
      } else {
        this.nombreInicioSesion = this.nombreUsuario;
      }
      return this.nombreInicioSesion;

    },
    
  },
  mounted() {
    this.usuarioentrante = sessionStorage.getItem('usuario');
    axios
      .get('/json/products.json')
      .then((response) => {
        this.productos = response.data.products;
      })
      .catch((error) => {
        console.error(error);
      });
  },
 
  methods: {
    añadirAlCarrito(index) {
      let agregar = true
      if(this.carrito == 0){
        this.carrito.push({
          title: this.productos[index].title,
          price: this.productos[index].price,
          unidadesCompradas: 1,
        });
      }else{
        for(let i = 0; i < this.carrito.length; i++){
          if(this.carrito[i].title == this.productos[index].title){
            agregar = false

            this.carrito[i].unidadesCompradas++;
          }
         
        }
        if(agregar){
          this.carrito.push({
            title: this.productos[index].title,
            price: this.productos[index].price,
            unidadesCompradas: 1,
          });
        }
      }

    
    },
    }
    }
  
  
  //   añadirAlCarrito(index) {
  //   const producto = this.productos[index];
  //   let carritoItem = this.carrito.find(item => item.title === producto.title);

  //   if (!carritoItem) {
  //     carritoItem = {
  //       title: producto.title,
  //       price: producto.price,
  //       unidadesCompradas: 0,
  //     };
  //     this.carrito.push(carritoItem);
  //   }

  //   carritoItem.unidadesCompradas++;
  // },

</script>