<template>
  <div class="h-full py-4 w-full">
    <h1 class="text-xl md:text-2xl text-gray-500 mb-3">{{ header }}</h1>
     
    <Vue3EasyDataTable
      buttons-pagination
     :headers="columnDefs"
     :items="rowData"
    />


  </div>
</template>

<script>
import Vue3EasyDataTable from 'vue3-easy-data-table';

import 'vue3-easy-data-table/dist/style.css';

export default {
    props:{
        header:{
            type:String,
            required:true
        },
        columnDefs:{
          type:Array,
          required:true
        },
        rowData:{
            type:Array,
            required:true
        }
    },
    components:{
      Vue3EasyDataTable
    },
}
</script>

<style>

</style>