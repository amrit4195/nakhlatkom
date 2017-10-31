import Vue from 'vue'
import Router from 'vue-router'
import home from '../components/home.vue'
import signup from '../components/signup.vue'
import login from '../components/login.vue'
import contact from '../components/contact.vue'
import product_page from '../components/product_page.vue'

Vue.use(Router)
const router = new Router({
// export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: home
    },
    {
      path: '/signup',
      name: 'signup',
      component: signup
    },
    {
      path: '/login',
      name: 'login',
      component: login
    },
    {
      path: '/contact',
      name: 'contact',
      component: contact
    },
    { path: '/product_page/:product_id',
      name: 'product_page',
      component:product_page
    }
  ]
})

export default router
