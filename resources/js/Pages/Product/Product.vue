<template>
   <Navbar/>
    
   <div v-if="product" class="min-h-screen mt-12 md:mt-20 max-w-5xl mx-auto md:px-4 px-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 py-3 md:px-0 px-1">
            <div class="">
                <img :src="product.images[0].image" alt="" class=" w-full object-cover mb-6">
                <div class="grid grid-cols-3 gap-2" v-if="product.images.length > 1">
                  <img v-for="Image,index in product.images" :key="index" :src="Image.image" alt="" srcset="" class="h-32 w-full object-cover">
                </div>
            </div>
            <div class="">
              <h1 class="text-3xl md:text-6xl mb-4">{{ product.name }}</h1>
              <h6 class="text-2xl">KSh {{ product.price }}</h6>

               <!-- size -->
            <div class="flex items-center gap-3 my-6">
                <p class="text-base">Size :</p>

                <div class="flex items-center gap-3">
                  <div v-for="size,index in split(product.size)" :key="index" class="">
                      <input :id="size" type="radio" name="size" class="hidden peer size" :value="size" />
                      <label :for="size" class="flex items-center justify-center px-4 py-2  border border-1 hover:bg-[#222] hover:border-white hover:text-white hover:cursor-pointer peer-checked:bg-[#222] peer-checked:text-white">{{ size }}</label>
                  </div>
                </div>

            </div>

            <!-- color -->

            <div class="flex items-center gap-3 my-6">
                <p class="text-base">Color :</p>
                <div class="flex items-center gap-3">
                   <div class="" v-for="color,index in split(product.colors)" :key="index" >
                        <input :id="color" type="radio" name="color" class="hidden peer color" :value="color"/>
                        <label :for="color" class="flex items-center justify-center p-4 rounded-full bg-indigo-300 hover:cursor-pointer peer-checked:ring-2 peer-checked:ring-pink-500 peer-checked:ring-offset-2" :style="backgroundColor(color)"></label>
                   </div>  
                </div>
            </div>

            <!-- stock -->
            <div class="flex items-center gap-3 my-6">
                <p class="text-base">In Stock:</p>
                 <p class="text-sm text-gray-400">{{product.stock}} remaining</p>
            </div>

            <!-- Quantity -->
            <div class="flex items-center gap-3 my-6">
                <p class="text-base">Quantity:</p>
                 <div class=" flex gap-2 items-center">
                  <button @click="ReducedQuantity()" class="flex  items-center justify-center border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-6 py-2 w-full text-base">
                     -
                 </button>
                  <input type="number" :value="quantity" class="px-4 border border-gray-400 py-2 w-20">
                  <button @click="AddQuantity()" class="flex  items-center justify-center border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-6 py-2 w-full text-base">
                        +
                  </button>
                 </div>
            </div>


            <!-- buttons -->
              <div class="flex items-center gap-2">
                <button @click="AddToWishList()" :disabled="form.processing" class="flex  items-center justify-center border border-gray-400 hover:bg-[#222] group-hover hover:text-white px-6 py-2 w-full text-base mt-4">
                      Add to WishList
                </button>
                <button @click="AddCart()" class="flex  items-center justify-center border border-gray-400 bg-[#222] text-white hover:bg-transparent group-hover hover:text-gray-500 px-6 py-2 w-full text-base mt-4">
                      Add to Cart
                </button>
              </div>
            </div>
        </div>

        <!-- Row Component -->
        <div class="min-h-56" ref="relatedContainer">
             <Row title="Related Products" :data="RelatedProducts" :Loading="loading"/>
        </div>
        
   </div>

   <!-- loader -->
   <div v-else>
      <Loader/>
    </div>
    
   <Footer/>
</template>

<script setup>
import {onMounted, ref} from 'vue'
import { useStore } from 'vuex';
import {useForm } from '@inertiajs/vue3';

import Navbar from '@/Components/Navbar.vue'
import Footer from '@/CustomComponents/Footer.vue'
import Loader from '@/CustomComponents/Loader.vue'
import Row from '@/CustomComponents/Row.vue'
import MiniLoader from '@/CustomComponents/MiniLoader.vue'

import {split,backgroundColor,AddToCart} from '@/utils.js'
import  { createToaster } from "@meforma/vue-toaster";

const store = useStore()

// toaster
const toaster = createToaster({ 
position:"top-right",
duration:4000,
 });

let RelatedProducts = ref({})
let quantity = ref(1)
let relatedContainer = ref(null)
let loading = ref(false)
let CategoryID = 0;


const {product} = defineProps(['product'])


const form=useForm({
  product_id:'',
  user_id:''
})


CategoryID = product.category_id;

let loadData =()=>{
  
  loading.value = true

    fetch(`/products/related/${CategoryID}`)
      .then((response)=>{
        if(response.ok && response.status === 200){
          return response.json();
        }
      })
      .then((data)=>{
        RelatedProducts.value = data;
        loading.value = false
      })
      .catch((err)=>{
        loading.value = false
        console.log(err)
      })
}

onMounted(()=>{
  
  const options = {
    root: null, 
    rootMargin: '0px', 
    threshold: 0.3, 
  };
 
  const intersectionObserver = new IntersectionObserver(handleIntersection, options);
  
  intersectionObserver.observe(relatedContainer.value);

  function handleIntersection(entries){
     entries.forEach((entry) => {
      if (entry.isIntersecting) {
        loadData();
        intersectionObserver.unobserve(relatedContainer.value);
      }
    });
  }


})


const AddQuantity=()=>{
   quantity.value = quantity.value +1
}

const ReducedQuantity=()=>{
  if(quantity.value > 1){
    quantity.value = quantity.value -1
  }
  else{
    quantity.value = 1
  }
}

// Add item to cart
const AddCart=()=>{
  let colors = document.querySelectorAll('.color')
  let sizes = document.querySelectorAll('.size')
   
  let colorElement=Array.from(colors).find(radio=>radio.checked)
  let sizeElement = Array.from(sizes).find(radio=>radio.checked)

   const {id,price,images,name} = product
   
   const Order = {
      orders:{
        [id]:{
        name,
        image:images[0].image,
        price,
        order_details:[
          {
            quantity:quantity.value,
            size:sizeElement.value,
            color:colorElement.value,
          }
        ],
        total_quantity:quantity.value,
      }
     },
     total_price:price * quantity.value
   }

   AddToCart(Order,id)

   toaster.success("Added to cart")
}

// Add item to wishlist
const AddToWishList = ()=>{
  const LoggedIn = store.state.LoggedIn

  if(LoggedIn){
  const user = store.state.user
    form.transform(data=>({
      product_id :product.id,
      user_id:user.id
    })).post('/wishlist/add',{
      onSuccess:()=>{
        toaster.success("Product added to wishList")
      },
      onError:(error)=>{
        const values = Object.values(error)
        values.forEach(value=>{
         toaster.error(value)
       })
      }
     })
  }
  else{
    window.location = '/login'
  }

}

</script>

<style>

</style>