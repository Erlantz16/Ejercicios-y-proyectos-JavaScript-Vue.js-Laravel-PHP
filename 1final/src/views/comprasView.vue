    <template>
        <h1>has entrado como {{this.usuarioentrante}}</h1>
        <div class="productos">
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Precio</th>
                </tr>
                <tr v-for="(products, index) in productos" :key="index">
                    <td>{{products.title}}</td>
                    <td>{{products.description}}</td>
                    <td>{{products.category}}</td>
                    <td>{{products.stock}}</td>
                    <td>{{products.price}}</td>
                    <td><button @click="añadir(index)">añadir</button></td>
                </tr>
            </table>
        </div>
        <div>
            <h1>Carrito</h1>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Precio</th>
                </tr>
                <tr v-for="(producto, index) in carrito" :key="index">
                    <td>{{producto.title}}</td>
                    <td>{{producto.description}}</td>
                    <td>{{producto.category}}</td>
                    <td>{{producto.stock}}</td>
                    <td>{{producto.price}}</td>
                </tr>
            </table>
        </div>


    </template>
    <script>
    import axios from 'axios';
    export default {
        name: 'comprasView',
        data() {
            return {
                productos: [],
                carrito: {

                    titulo: '',
                    descripcion: '',
                    categoria: '',
                    stock: '',
                    precio: '',

                },
                total: 0,
                usuario: '',
                usuarioentrante: '',
                
            }
        },

        mounted() {


            this.usuarioentrante = sessionStorage.getItem('usuario');

            axios.get('/public/json/products.json')
                .then(response => {
                    this.productos = response.data.products;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        methods: {
            añadir(index) {
                this.carrito.titulo = this.productos[index].title;
                this.carrito.descripcion = this.productos[index].description;
                this.carrito.categoria = this.productos[index].category;
                this.carrito.stock = this.productos[index].stock;
                this.carrito.precio = this.productos[index].price;
                

        }
        }
    }


    </script>