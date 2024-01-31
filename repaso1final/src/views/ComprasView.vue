<template>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                </tr>

            </thead>
            <tbody>
                <tr v-for="(producto, index) in productos" :key="producto.title">
                    <td>{{ producto.title }}</td>
                    <td>{{ producto.description }}</td>
                    <td>{{ producto.price }}</td>
                    <td>{{ producto.stock }}</td>
                    <td><button @click="añadirAlCarrito(index)">Añadir</button></td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio Unidad</th>
                    <th>Unidades</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(carro, index) in carrito" :key="carrito.title">
                    <td>{{ carro.title }}</td>
                    <td>{{ carro.price }}</td>
                    <td>{{ carro.unidadesCompradas }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'ComprasView',
    data() {
        return {
            productos: [],
            carrito: [],
        }
    },
    mounted() {
        axios.get('/public/json/products.json')
            .then(response => {
                this.productos = response.data.products;
            })
            .catch(error => {
                console.error(error);
            });
    },
    methods: {
        añadirAlCarrito(index) {
            let unidadesCompradas = 1;
            let añadir = true
            if (this.carrito.length == 0) {
                this.carrito.push({
                    title: this.productos[index].title,
                    price: this.productos[index].price,
                    unidadesCompradas: unidadesCompradas,
                });
            }else{

           
            for (let i = 0; i < this.carrito.length; i++) {
                if (this.carrito[i].title == this.productos[index].title) {
                    añadir = false;

                    this.carrito[i].unidadesCompradas += unidadesCompradas;
                    break;
                } else {
                    break;
                }
            }
            if (añadir==true) {
                this.carrito.push({
                    title: this.productos[index].title,
                    price: this.productos[index].price,
                    unidadesCompradas: unidadesCompradas,
                });
            }
        }
              //los errores del for son:
              // no funciona el contador de unidades compradas
              //no se añaden las cosas al arry carrito
                
            
        },

    }
}
</script>