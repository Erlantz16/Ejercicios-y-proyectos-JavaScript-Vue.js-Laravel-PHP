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
              <th>Categoría</th>
              <th>Stock</th>
              <th>Precio</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(producto, index) in productos" :key="index">
              <td>{{ producto.title }}</td>
              <td>{{ producto.description }}</td>
              <td>{{ producto.category }}</td>
              <td>{{ producto.stock }}</td>
              <td>{{ producto.price }}</td>
              <td><button @click="añadirAlCarrito(index)">Añadir</button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
        <h2>Carrito</h2>
        <table>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Categoría</th>
              <th>Stock</th>
              <th>Precio</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(producto, index) in carrito" :key="index">
              <td>{{ producto.title }}</td>
              <td>{{ producto.description }}</td>
              <td>{{ producto.category }}</td>
              <td>{{ producto.stock }}</td>
              <td>{{ producto.price }}</td>
            </tr>
          </tbody>
        </table>
      </div>
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
    methods: {
      añadirAlCarrito(index) {
        const productoSeleccionado = this.productos[index];
        this.carrito.push({
          title: productoSeleccionado.title,
          description: productoSeleccionado.description,
          category: productoSeleccionado.category,
          stock: productoSeleccionado.stock,
          price: productoSeleccionado.price,
        });
      },
    },
  };
  </script>