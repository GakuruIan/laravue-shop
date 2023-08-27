<template>
  <Appbar/>
  <div class="mt-12 md:mt-24 max-w-5xl mx-auto md:px-0 px-2">
  <div class="mt-6 py-4">
    <!-- create product modal -->
    <Modal :show="show">
      <div  class="px-4 px-2">
        <h1 class="text-xl text-gray-400 text-center mb-2">Create Product</h1>
        <form @submit.prevent="submit">
          <!-- product name -->
          <div class="mb-4">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product name</label>
            <input type="text" id="name" v-model="form.name" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tshirt " required>
            <InputError class="mt-2" :message="form.errors.name" />
          </div>

          <!-- product catergory -->
          <div class="mb-4">
            <label for="catergory" class="block mb-2 text-sm font-medium text-gray-900">Product catergory</label>
              <select id="customselect" v-model="form.category_id"  class="block appearance-none w-full  border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" aria-placeholder="Select Catergory">
                 <option disabled v-if="Catergories.length === 0">Loading...</option>
                <option :value="catergory.id" v-for="catergory in Catergories" :key="catergory.id">{{ catergory.catergory_name }}</option>
              </select>
            <InputError class="mt-2" :message="form.errors.category_id" />
          </div>
          

          <!-- product price -->
          <div class="mb-4">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Product price</label>
            <input type="number"  id="price" v-model="form.price" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E.g 1200" required>
            <InputError class="mt-2" :message="form.errors.price" />
          </div>

          <!-- product description -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-2">

            <!-- size -->
            <div class="mb-4">
              <label for="size" class="block mb-2 text-sm font-medium text-gray-900">Product size</label>
              <input type="text" id="size" v-model="form.size" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="md,sm,lg" required>
              <InputError class="mt-2" :message="form.errors.size" />
            </div>

              <!-- color -->
            <div class="mb-4">
              <label for="color" class="block mb-2 text-sm font-medium text-gray-900">Product color</label>
              <input type="text" id="color" v-model="form.color" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E.g Orange" required>
              <InputError class="mt-2" :message="form.errors.color" />
            </div>

            <!-- stock -->
            <div class="mb-4">
              <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Product stock</label>
              <input type="number" id="stock" v-model="form.stock" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E.g 5" required>
              <InputError class="mt-2" :message="form.errors.stock" />
            </div>

          </div>

          <!-- description -->
          <div class="mb-4">
              <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product description</label>
              <textarea rows="3" id="description" v-model="form.description" class="w-full max-h-24 rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product description" required></textarea>
              <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <!-- product image --> 
            <div class="h-full w-full" v-if="ImagePreviews.length > 0">
              <div class="grid grid-cols-3 md:gap-2 gap-1">
                 <div class="" v-for="(preview,key) in ImagePreviews" :key="key">
                    <img :src="preview" alt="" srcset="" class="h-32 w-full object-fit">
                </div>
              </div>
            </div>

            <div class="mb-4" v-else>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product Image</label>
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" multiple type="file" name="images" class="hidden" @change="handleChange"/>
                    </label>
                </div> 
            </div>

            <div class="flex items-center justify-end gap-2 py-2">
                    <button @click="toggleModal" type="button" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-red-600 hover:bg-red-500 hover:cursor-pointer">
                        cancel
                    </button>
                    <button type="submit" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-green-600 hover:bg-green-500 hover:cursor-pointer">
                        create product
                    </button>
            </div>

        </form>
      </div>
    </Modal>
      <!--end create product modal -->

      <!-- Edit modal -->
        <Modal :show="showEdit">
          <div class="" v-if="showLoader">
              <Loader/>
          </div>
          <div  class="px-4 px-2" v-else>
            <h1 class="text-xl text-gray-400 text-center mb-2">Edit Product</h1>
            <form @submit.prevent="Update">
              <!-- product name -->
              <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product name</label>
                <input type="text" id="name" v-model="form.name" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tshirt " required>
                <InputError class="mt-2" :message="form.errors.name" />
              </div>

              <!-- product catergory -->
              <div class="mb-4">
                <label for="catergory" class="block mb-2 text-sm font-medium text-gray-900">Product catergory</label>
                  <select id="customselect" @click="GetCategories()" v-model="form.category_id"  class="block appearance-none w-full  border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" aria-placeholder="Select Catergory">
                    <option disabled v-if="Catergories.length === 0">Loading...</option>
                    <option :value="catergory.id" v-for="catergory in Catergories" :key="catergory.id">{{ catergory.catergory_name }}</option>
                  </select>
                <InputError class="mt-2" :message="form.errors.category_id" />
              </div>
              

              <!-- product price -->
              <div class="mb-4">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Product price</label>
                <input type="number"  id="price" v-model="form.price" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E.g 1200" required>
                <InputError class="mt-2" :message="form.errors.price" />
              </div>

              <!-- product description -->
              <div class="grid grid-cols-1 md:grid-cols-3 gap-2">

                <!-- size -->
                <div class="mb-4">
                  <label for="size" class="block mb-2 text-sm font-medium text-gray-900">Product size</label>
                  <input type="text" id="size" v-model="form.size" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="md,sm,lg" required>
                  <InputError class="mt-2" :message="form.errors.size" />
                </div>

                  <!-- color -->
                <div class="mb-4">
                  <label for="color" class="block mb-2 text-sm font-medium text-gray-900">Product color</label>
                  <input type="text" id="color" v-model="form.color" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E.g Orange" required>
                  <InputError class="mt-2" :message="form.errors.color" />
                </div>

                <!-- stock -->
                <div class="mb-4">
                  <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Product stock</label>
                  <input type="number" id="stock" v-model="form.stock" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E.g 5" required>
                  <InputError class="mt-2" :message="form.errors.stock" />
                </div>

              </div>

              <!-- description -->
              <div class="mb-4">
                  <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product description</label>
                  <textarea rows="3" id="description" v-model="form.description" class="w-full max-h-24 rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product description" required></textarea>
                  <InputError class="mt-2" :message="form.errors.description" />
                </div>

                <!-- product image --> 
                <div class="h-full w-full" v-if="images.length > 0">
                  <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Current Product Images</label>
                  <div class="grid grid-cols-3 md:gap-2 gap-1">
                    <div class="" v-for="(preview,key) in images" :key="key">
                        <img :src="preview.image" alt="" srcset="" class="h-32 w-full object-fit">
                    </div>
                  </div>

                  <div class="h-full w-full mt-4" v-if="ImagePreviews.length > 0">
                          <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">New Product Images</label>
                          <div class="grid grid-cols-3 md:gap-2 gap-1">
                            <div class="" v-for="(preview,key) in ImagePreviews" :key="key">
                                <img :src="preview" alt="" srcset="" class="h-32 w-full object-fit">
                            </div>
                          </div>
                      </div>
                  
                  <div class="flex items-center justify-center w-full mt-4">
                      <label for="dropzone-file" class="flex flex-col items-center justify-center w-full py-4   cursor-pointer bg-indigo-600 ">
                          <div class="flex gap-2 items-center justify-center">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                              </svg>
                              <p class="text-base text-white">Change Image</p>
                          </div>
                          <input id="dropzone-file" multiple type="file" class="hidden" @change="handleChange" />
                      </label>
                  </div> 

                  </div>
    
               

                <div class="flex items-center justify-end gap-2 py-2">
                        <button @click="toggleEditModal(0)" type="button" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-red-600 hover:bg-red-500 hover:cursor-pointer">
                            cancel
                        </button>
                        <button type="submit" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-green-600 hover:bg-green-500 hover:cursor-pointer">
                            Update product
                        </button>
                </div>

            </form>
          </div>
        </Modal>
      <!-- end Edit modal -->

      <!-- display modal -->
       <modal :show="showDisplay">
         <div class="" v-if="showLoader">
              <Loader/>
          </div>
          <div  class="px-4 px-2" v-else>
            <h1 class="text-xl text-gray-400 text-center mb-2">Product Information</h1>


                <div class="flex items-center justify-between gap-2 my-4">
                  <h4 class="text-base text-gray-700">Name</h4>
                  <h4 class="text-sm text-gray-700">{{ product.name }}</h4>
                </div>

                <div class="flex items-center justify-between gap-2 my-4">
                  <h4 class="text-sm text-gray-700">Catergory</h4>
                  <h4 class="text-sm text-gray-700">{{ product.category_id }}</h4>
                </div>


       
              <div class="flex items-center justify-between gap-2 my-4">
                <h4 class="text-sm text-gray-700">Color</h4>
                <h4 class="text-sm text-gray-700">{{ product.color }}</h4>
              </div>

              <div class="flex items-center justify-between gap-2 my-4">
                <h4 class="text-sm text-gray-700">Size</h4>
                <h4 class="text-sm text-gray-700">{{ product.size }}</h4>
              </div>
           

              <div class="flex items-center justify-between gap-2 my-4">
                <h4 class="text-sm text-gray-700">Price</h4>
                <h4 class="text-sm text-gray-700">{{ product.price }}</h4>
              </div>

              <div class="flex items-center justify-between gap-2 my-4">
                <h4 class="text-sm text-gray-700">Stock</h4>
                <h4 class="text-sm text-gray-700">{{ product.stock }}</h4>
              </div>
         

            <div class="flex  flex-col my-4">
              <h4 class="text-sm text-gray-700">Description</h4>
              <h4 class="text-sm text-gray-500">{{ product.description }}</h4>
            </div>
            
            <div class="grid grid-cols-3 md:gap-2 gap-1 py-4">
                  <div class="" v-for="(preview,key) in product.images" :key="key">
                      <img :src="preview.image" alt="" srcset="" class="h-32 w-full object-fit">
                  </div>
            </div>
            
            <div class="flex items-center justify-end gap-2 py-2">
                <button @click="toggleDisplayModal(0)" type="button" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-red-600 hover:bg-red-500 hover:cursor-pointer">
                     close
                </button>
            </div>
          </div>
       </modal>
      <!-- end display modal -->


       <!-- Delete confirmation modal -->
       <ConfirmationModal :show="showConfirmationBox">
             <template #title>
               <h1 class="text-xl"> Deletion Confirmation</h1>
             </template>
              
             <template #content>
                 <h6 class="text">Confirm you want to delete this product {{  productname }}  </h6>
             </template>

             <template #footer>
              <div class="flex gap-2">
                     <button @click="closeConfirmationBox()" type="button" class="rounded text-red-500 px-4 py-2 flex items-center gap-2 border border-red-500 hover:bg-red-500 hover:cursor-pointer hover:text-red-100">
                              cancel
                      </button>

                      <button type="button" @click="DeleteProduct()" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-red-600 hover:bg-red-500 hover:cursor-pointer">
                              Yes, Delete
                        </button>
              </div>
                        
                       
             </template>
          </ConfirmationModal>
          <!-- Delete confirmation modal -->
    <div class="flex items-center justify-between w-full mt-4 md:mt-0">
      <div class="">
          <TextInput
            id="search"
            v-model="search"
            type="search"
            class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
            required
            placeholder="search.."
          />
      </div>
      <button @click="toggleModal" class="text-white px-4 py-2 flex items-center gap-2 bg-green-600 hover:bg-green-500 hover:cursor-pointer">
          create product
      </button>
    </div>

    <!-- Table -->
    <div class="mt-4">
      <Vue3EasyDataTable
        v-model:items-selected="itemsSelected"
        buttons-pagination
        :headers="headers"
        :items="rows"
        :search-value="search"
      >

      <!-- <template #item-image="{ images }" >
        <img :src="images" alt="Product Image" class="w-20 h-20 p-2" />
      </template> -->

      <template #item-action="{id,name}">
        <div class="flex gap-1">
          
          <!-- see more icon -->
          <span class="p-2" @click="toggleDisplayModal(id)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-indigo-600 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </span>

          <!-- Edit icon -->
          <span class="p-2" @click="toggleEditModal(id)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-indigo-600 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
          </span>

          <!-- Delete icon -->
          <span class="p-2" @click="showDeleteConfirmation(id,name)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-red-600 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
         </span>
        </div>
      </template>

    </Vue3EasyDataTable>
    </div>
  </div>
</div>
</template>

<script setup>
import Loader from '@/AdminComponents/Loader.vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import Modal from '../../../Components/Modal.vue'
import ConfirmationModal from '@/Components/ConfirmationModal.vue'

import { ref } from 'vue';
import Appbar from '../../../AdminComponents/Appbar.vue';
import { useForm,router } from '@inertiajs/vue3';
import  { createToaster } from "@meforma/vue-toaster";
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';

const toaster = createToaster({ 
position:"top-right",
duration:4000,
 });

 const { products} = defineProps(['products']);

let show = ref(false);
let ImagePreviews = ref([])
let Catergories = ref([])
let rows = ref([])
let search = ref("")
let showEdit = ref(false)
let showDisplay =ref(false)
let itemsSelected = ref([])
let images = ref([]);
let showLoader = ref(false)
let product_Id = ref(0)
let product = ref({})
let showConfirmationBox = ref(false)
let productname = ref("")

// initializing form values
const form = useForm({
   category_id:'',
   name:'',
   price:'',
   color:'',
   size:'',
   description:'',
   stock:'',
   images:null
})

// Fetching product categories
const GetCategories =()=>{
   if(Catergories.value.length === 0){
    fetch('/catergory/all')
      .then((response)=>{
        if(response.ok){
          return response.json()
        }
      }).then((data)=>{
        Catergories.value = data;
      })
      .catch((err)=>{
        console.log(err)
      })
   }

}

// toggling the create modal
const toggleModal =()=>{
    show.value = !show.value;

    if(show.value){
      fetch('/catergory/all')
      .then((response)=>{
        if(response.ok){
          return response.json()
        }
      }).then((data)=>{
        Catergories.value = data;
      })
      .catch((err)=>{
        console.log(err)
      })
    }
}

// toggling the Edit modal
const toggleEditModal=(id)=>{
  showEdit.value = !showEdit.value
  showLoader.value = true

   if(showEdit.value){
    let productid =id;

    fetch(`/products/${id}`)
      .then((response)=>{
        if(response.ok){
          return response.json();
        }
      })
      .then((data)=>{
        const { [productid] : productInfo } = data;
        
        product_Id.value = productInfo.id;

      

        form.name = productInfo.name;
        form.category_id=productInfo.category_name
        form.price= productInfo.price
        form.color= productInfo.color
        form.size= productInfo.size
        form.description= productInfo.description
        form.stock= productInfo.stock
        
        images.value = productInfo.images

        showLoader.value = false
      })
      .catch((error)=>{
           showEdit.value= false;
          toaster.error(error)
      })

    }
   }

// toggling product display
const toggleDisplayModal=(id)=>{
  showDisplay.value = !showDisplay.value;

  if(showDisplay.value){

    showLoader.value=true

    fetch(`/products/${id}`)
    .then((response)=>{
      if(response.ok){
        return response.json();
      }
    })
    .then((data)=>{
       const { [id] : productInfo } = data;
       product.value = productInfo;
       showLoader.value =false
    })
    .catch((error)=>{
      showDisplay.value = false
      toaster.error(error)
      console.log(error)
    })
  }

}

// showing deleting comfirmation dialog
const showDeleteConfirmation =(id,name)=>{
   showConfirmationBox.value = true;
   productname.value = name;
   product_Id.value = id;
}

// closing delete confirmation box
const closeConfirmationBox=()=>{
  showConfirmationBox.value = false;
}


// deleting the product
const DeleteProduct=()=>{

  if(product_Id.value !== 0){

    router.post(`/delete/product/${product_Id.value}`,{
    _method:'delete',
    onSuccess:()=>{
      product_Id.value=0;
      showConfirmationBox.value = false;
      toaster.success("Product deleted successfully")
    },
    onFinish:()=>{
      product_Id.value=0;
    },
    onError:(error)=>{
      product_Id.value=0;

      showConfirmationBox.value = false;

      const values = Object.values(error)

      values.forEach(value=>{
        toaster.error(value)
      })

    }
  })
  }


}



// Submitting form
const submit=()=>{
  form.post('/create/product',{
    onFinish:()=>{
      form.reset('name','price','color','size','description','stock','images')
    },
    onSuccess:()=>{
      show.value = false
      form.reset('name','price','color','size','description','stock','images')
      toaster.success("Product created successfully")
    },
    onError:(error)=>{
      const values = Object.values(error);
      values.forEach(value => {
        toaster.error(value);
      });

    }
  })
}

// update product information
const Update =()=>{

   router.post(`/update/product/${product_Id.value}`,{
    _method:'put',
    category_id:form.category_id,
    name:form.name,
    price:form.price,
    color:form.color,
    size:form.size,
    description:form.description,
    stock:form.stock,
    images:form.images,
    
    onSuccess:()=>{
      showEdit.value =false;
      form.reset('name','price','color','size','description','stock','images')
      toaster.success("Product updated successfully")
    },
    onError:(error)=>{
      const values = Object.values(error);

        values.forEach(value => {
          toaster.error(value);
        });
    }
  })
}


 //handling image change
const handleChange=(e)=>{

  let images = []
  let FilesList = e.target.files

  const promises = Array.from(FilesList).map((file)=>{
     return new Promise((resolve,reject)=>{
      const reader = new FileReader();

        reader.onload = (event) => {
          images.push(event.target.result)
          resolve()
        };

        reader.readAsDataURL(file);
     })
  })
 
  Promise.all(promises).then(()=>{
    ImagePreviews.value = images
    form.images = FilesList
  })
 
}

// headers for vue table
const headers = [
          {text:'Id',value:'id',sortable:true},
          {text: 'Product name',value: 'name' },
          {text: 'Price',value: 'price',sortable:true },
          {text: 'Category',value: 'catergory_name' },
          {text: 'Stock',value: 'stock' },
          {text: 'Colors',value: 'colors' },
          {text: 'Created',value: 'created_at' },
          {text: 'Updated',value: 'updated_at' },
          {text:'Action',value:"action"}
    ];
    // data for the table
rows.value = products;




// ** create the update function and pop up for the individual product


</script>

<style scoped>

</style>