<template>
    <Appbar/>
 <div class="mt-12 md:mt-24 max-w-5xl mx-auto md:px-0 px-2">
   <div class="mt-4 py-4">
     <Table header="Deliveries" :columnDefs="columnDefs" :rowData="rowData"/>
   </div>
  </div>
</template>

<script>
import Appbar from '../../../AdminComponents/Appbar.vue'
import Table from '../../../AdminComponents/Table.vue'
export default {
components:{
    Table,
    Appbar
},
setup(){
    return{
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