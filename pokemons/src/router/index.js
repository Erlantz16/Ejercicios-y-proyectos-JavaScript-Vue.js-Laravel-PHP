import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Pokemon from '../components/Pokemon.vue'
import Ejercicio3 from '../components/Ejercicio3.vue'
import plantilla from '../components/plantilla.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/pokemon',
      name: 'pokemon',
      component: Pokemon
    },
    {
      path: '/plantilla',
      name: 'plantilla',
      component: plantilla
    },
    {
      path: '/ejercicio3',
      name: 'ejercicio3',
      component: Ejercicio3
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
