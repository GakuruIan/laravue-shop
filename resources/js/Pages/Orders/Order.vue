
<template>
  <Navbar/>
  <div class="mt-16 md:mt-20 max-w-6xl mx-auto md:px-4 px-2">
    <div class="py-4 md:w-48 w-full">
      <TextInput
            id="search"
            v-model="search"
            type="search"
            class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
            required
            placeholder="search.."
          />
    </div>
    <div class="mt-2">
          <Vue3EasyDataTable
            v-model:items-selected="itemsSelected"
                  buttons-pagination
                  :headers="headers"
                  :items="rows"
                  :search-value="search"
          >

            <!-- action button -->
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
</template>



<script setup>
import Navbar from '@/Components/Navbar.vue'
import { ref } from 'vue';
import TextInput from '@/Components/TextInput.vue';
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';

let rows = ref([])
let search = ref("")

// headers for tables
const headers = [
          {text:'Id',value:'id',sortable:true},
          {text: 'Product name',value: 'name' },
          {text: 'Price',value: 'price',sortable:true },
          {text: 'Colors',value: 'colors' },
          {text: 'Created',value: 'created_at' },
          {text: 'Updated',value: 'updated_at' },
          {text:'Action',value:"action"}
    ];


</script>
