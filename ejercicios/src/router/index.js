import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue'
import Ejercicio1 from '../components/Ejercicio1.vue';
import Ejercicio2 from '../components/Ejercicio2.vue';
import Ejercicio3 from '../components/Ejercicio3.vue';
import Ejercicio4 from '../components/Ejercicio4.vue';
import Ejercicio5 from '../components/Ejercicio5.vue';


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/ejercicio1',
      name: 'ejercicio1',
      component: Ejercicio1
    },
    {
      path: '/ejercicio2',
      name: 'ejercicio2',
      component: Ejercicio2
    },
    {
      path: '/ejercicio3',
      name: 'ejercicio3',
      component: Ejercicio3
    },
    {
      path: '/ejercicio4',
      name: 'ejercicio4',
      component: Ejercicio4
    },
    {
      path: '/ejercicio5',
      name: 'ejercicio5',
      component: Ejercicio5
    }
    
  ]
})

export default router
