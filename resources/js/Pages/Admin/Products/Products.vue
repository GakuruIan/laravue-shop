<template>
  <Appbar/>
  <div class="mt-12 md:mt-24 max-w-5xl mx-auto md:px-0 px-2">
  <div class="mt-6 py-4">
    <Modal :show="show">
      <div  class="px-4 px-2">
        <h1 class="text-xl text-gray-400 text-center mb-2">Create Product</h1>
        <form action="">
          <!-- product name -->
          <div class="mb-4">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product name</label>
            <input type="text" id="name" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tshirt " required>
          </div>

          <!-- product price -->
          <div class="mb-4">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Product price</label>
            <input type="text" id="price" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E.g 1200" required>
          </div>

          <!-- product description -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-2">

            <!-- size -->
            <div class="mb-4">
              <label for="size" class="block mb-2 text-sm font-medium text-gray-900">Product size</label>
              <input type="text" id="size" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="md,sm,lg" required>
            </div>

              <!-- color -->
            <div class="mb-4">
              <label for="color" class="block mb-2 text-sm font-medium text-gray-900">Product color</label>
              <input type="text" id="color" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E.g Orange" required>
            </div>

            <!-- stock -->
            <div class="mb-4">
              <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Product stock</label>
              <input type="text" id="stock" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E.g 5" required>
            </div>

          </div>

          <!-- description -->
          <div class="mb-4">
              <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product description</label>
              <textarea rows="3" id="description" class="w-full max-h-24 rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product description" required></textarea>
            </div>

            <!-- product image --> 
            <div class="mb-4">
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
                        <input id="dropzone-file" type="file" class="hidden" />
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
    <div class="flex items-center justify-end w-full">
      <button @click="toggleModal" class="text-white px-4 py-2 flex items-center gap-2 bg-green-600 hover:bg-green-500 hover:cursor-pointer">
          create product
      </button>
    </div>
    <Table header="All Products" :columnDefs="columnDefs" :rowData="rowData"/>
  </div>
</div>
</template>

<script>
import Table from '../../../AdminComponents/Table.vue';
import Modal from '../../../Components/Modal.vue'
import { ref } from 'vue';
import Appbar from '../../../AdminComponents/Appbar.vue';
export default {
  setup(){
    let show = ref(false);

    const toggleModal =()=>{
       show.value = !show.value;
    }
    return{
      show,
      toggleModal
    }
  },
  components:{
    Table,
    Modal,
    Appbar
  },
  data(){
    return {
            columnDefs: [
                {headerName:'id', field:'id',sortable:true},
                {headerName:'Image', field:'image'},
                {headerName: 'product name', field: 'name' ,suppressSizeToFit: true },
                {headerName: 'Model', field: 'model',suppressSizeToFit: true },
                {headerName: 'Price', field: 'price',suppressSizeToFit: true,sortable:true },
                 {headerName: 'Quantity', field: 'quantity',suppressSizeToFit: true,sortable:true }
            ],
            rowData: [
                {id:'1',image:'image', name: 'Toyota', model: 'Celica', price: 35000 ,quantity:'5'},
                {id:'2',image:'image', name: 'Ford', model: 'Mondeo', price: 32000 ,quantity:'50'},
                {id:'3',image:'image', name: 'Porsche', model: 'Boxster', price: 72000 ,quantity:'15'}
            ]
        }
  }
}
</script>

<style>

</style>