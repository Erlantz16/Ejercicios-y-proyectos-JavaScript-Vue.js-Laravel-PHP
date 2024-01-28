<template>
    <div>
      <h1>Has entrado como {{ usuarioentrante }}</h1>
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
          Total:  {{ totalPrice}}

        </table>
      </div>
    </div>


    <div class="cantidad">
      
       
    
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'comprasView',
    data() {
      return {
        productos: [],
        carrito: [],
        usuarioentrante: '',
      };
    },
    mounted() {
      this.usuarioentrante = sessionStorage.getItem('usuario');
      axios
        .get('/public/json/products.json')
        .then((response) => {
          this.productos = response.data.products;
        })
        .catch((error) => {
          console.error(error);
        });
    },
     // ...
     computed: {
  unidadesCompradas() {
    let total = 0;
    for (let i = 0; i < this.carrito.length; i++) {
      total += this.carrito[i].unidadesCompradas;
    }
    return total;
  },
  totalPrice() {
    let total = 0;
    for (let i = 0; i < this.carrito.length; i++) {
      total += this.carrito[i].price * this.carrito[i].unidadesCompradas;
    }
    return total;
  },
},
    methods: {
      añadirAlCarrito(index) {
        const productoSeleccionado = this.productos[index];
        for (let i = 0; i < this.carrito.length; i++) {
          if (this.carrito[i].title === productoSeleccionado.title) {
    productoEnCarrito = this.carrito[i];
    break;
  }
        this.carrito.push({
          title: this.productos[index].title,
          price: productoSeleccionado.price,
          unidadesCompradas: 1,
               }); 
      }
    },
  },
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
  };
  </script>