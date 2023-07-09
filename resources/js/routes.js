import { createRouter, createWebHistory } from 'vue-router';

import Home from './CustomComponents/Home.vue'
import Product from './Pages/Product/Product.vue';
import Cart from './Pages/Cart/Cart.vue'
import CheckOut from './Pages/CheckOut/CheckOut.vue'
import Shop from './Pages/Shop/Shop.vue'

import Analysis from './AdminComponents/Anaylsis.vue'
import Products from './AdminComponents/Products/Products.vue'
import Orders from './AdminComponents/Orders/Orders.vue'
import Delieveries from './AdminComponents/Delieveries/Delieveries.vue'


const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path:'/shop',
      name:'Shop',
      component:Shop,
    },
    {
      path:'/product',
      name:'Product',
      component:Product,
    },
    {
      path:'/cart',
      name:"Cart",
      component:Cart
    },
    {
      path:'/checkout',
      name:"Checkout",
      component:CheckOut
    },
  ],
});

export default router;