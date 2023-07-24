<template>
   <Appbar/>
   <div class="mt-16 md:mt-24 max-w-5xl mx-auto md:px-0 px-2">
    <div class="mt-6 py-4">
          <!-- create modal -->
          <Modal :show="show">
            <div  class="px-4 px-2">
              <h1 class="text-xl text-gray-400 text-center mb-2">Create Product</h1>
              <form @submit.prevent="submit">

                <!-- catergory name -->
                <div class="mb-4">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Catergory name</label>
                  <input type="text" id="name"  v-model="form.catergory_name" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Men , Women , Baby " required>
                  <InputError class="mt-2" :message="form.errors.catergory_name" />
                </div>

                  <!-- catergory image --> 
                  
                  <div class="mb-4">
                    
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Category Image</label>
                          
                        
                          <div class="" v-if="form.image">
                            <img  alt="" :src="image_preview" class="h-32 w-24 object-fit mb-2">

                            <!-- changing image  -->
                            <label for="dropzone-file" class="flex gap-2 items-center justify-center  py-3 px-4  rounded-sm cursor-pointer bg-indigo-700 hover:bg-indigo-500">
                                      <div class="flex gap-4 items-center justify-center">
                                          <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                          </svg>
                                          <p class="text-sm text-white">Change Image</p>
                                      </div>
                                      <input id="dropzone-file" name="image" type="file" class="hidden" @change="handleChange" />
                              </label>

                              <InputError class="mt-2" :message="form.errors.image" />
                          </div>

                          <div class="" v-else>
                              <div class="flex items-center justify-center w-full">
                                  <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                                      <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                          <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                          </svg>
                                          <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                          <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                      </div>
                                      <input id="dropzone-file" name="image" type="file" class="hidden" @change="handleChange" />
                                  </label>
                              </div> 
                              <InputError class="mt-2" :message="form.errors.image" />
                          </div>
                  </div>

                  <div class="flex items-center justify-end gap-2 py-2">
                          <button @click="closeModal" type="button" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-red-600 hover:bg-red-500 hover:cursor-pointer">
                              cancel
                          </button>
                          <button type="submit" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-green-600 hover:bg-green-500 hover:cursor-pointer">
                              create category
                          </button>
                  </div>

              </form>
            </div>
          </Modal>
          <!-- end create modal -->


          <!-- edit modal -->
          <Modal :show="showEdit">
            <div  class="px-4 px-2">
              <h1 class="text-xl text-gray-400 text-center mb-2">Edit Category</h1>
              
               <form @submit.prevent="Editsubmit">

                <!-- catergory name -->
                <div class="mb-4">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Catergory name</label>
                  <TextInput type="text" id="name"  v-model="form.catergory_name" class="w-full rounded-sm border border-gray-200 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Men , Women , Baby " required/>
                  <InputError class="mt-2" :message="form.errors.catergory_name" />
                </div>

                  <!-- catergory image --> 
                  
                  <div class="mb-4">
                    
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Catergory Image</label>
                          <div class="">
                            <img  alt="" :src="image_preview" class="h-32 w-24 object-fit mb-2">

                            <!-- changing image  -->
                            <label for="file" class="flex gap-2 items-center justify-center  py-3 px-4  rounded-sm cursor-pointer bg-indigo-700 hover:bg-indigo-500">
                                      <div class="flex gap-4 items-center justify-center">
                                          <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                          </svg>
                                          <p class="text-sm text-white">Change Image</p>
                                      </div>
                                      <input id="file" name="image" type="file" class="hidden" @change="handleChange" />
                              </label>

                              <InputError class="mt-2" :message="form.errors.image" />
                          </div>
                  </div>

                  <div class="flex items-center justify-end gap-2 py-2">
                          <button @click="closeEditModal" type="button" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-red-600 hover:bg-red-500 hover:cursor-pointer">
                              cancel
                          </button>
                          <button type="submit" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-green-600 hover:bg-green-500 hover:cursor-pointer">
                              Update 
                          </button>
                  </div>

              </form>
            </div>
          </Modal>
          <!-- end edit modal -->

          <!-- Delete confirmation modal -->
          <ConfirmationModal :show="showConfirmationBox">
             <template #title>
               <h1 class="text-xl"> Deletion Confirmation</h1>
             </template>
              
             <template #content>
                 <h6 class="text">Confirm you want to delete {{ name }} category </h6>
             </template>

             <template #footer>
              <div class="flex gap-2">
                     <button @click="closeConfirmationBox()" type="button" class="rounded text-red-500 px-4 py-2 flex items-center gap-2 border border-red-500 hover:bg-red-500 hover:cursor-pointer hover:text-red-100">
                              cancel
                      </button>

                      <button type="button" @click="DeleteCategory()" class="rounded text-white px-4 py-2 flex items-center gap-2 bg-red-600 hover:bg-red-500 hover:cursor-pointer">
                              Yes, Delete
                        </button>
              </div>
                        
                       
             </template>
          </ConfirmationModal>
          <!-- Delete confirmation modal -->

    <div class="flex items-center justify-between w-full mb-8">
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
      <button @click="openModal" class="text-white px-4 py-2 flex items-center gap-2 bg-green-600 hover:bg-green-500 hover:cursor-pointer">
          create Catergory
      </button>
    </div>

    <Vue3EasyDataTable
      v-model:items-selected="itemsSelected"
      buttons-pagination
     :headers="headers"
     :items="rows"
     :search-value="search"
    >
      <template #item-image="{ image }" >
        <img :src="image" alt="Product Image" class="w-20 h-20 p-2" />
      </template>

      <template #item-action="{id}">
        <div class="flex gap-1">

          <!-- Edit icon -->
          <span class="p-2" @click="EditModal(id)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 stroke-indigo-600 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
          </span>

          <!-- Delete icon -->
          <span class="p-2" @click="showDeleteConfirmation(id)">
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
 import Appbar from '@/AdminComponents/Appbar.vue';
 import Modal from '@/Components/Modal.vue'
 import TextInput from '@/Components/TextInput.vue'
 import InputError from '@/Components/InputError.vue';
 import ConfirmationModal from '@/Components/ConfirmationModal.vue'
 import { ref } from 'vue';

 import { useForm,router } from '@inertiajs/vue3';
 import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({ 
position:"top-right",
duration:4000,
 });



const { Catergories } = defineProps(['Catergories']);

let show  = ref(false)
let showEdit = ref(false);
let showConfirmationBox = ref(false);
let image_preview=ref(null) ;
let itemsSelected = ref([])
let Category = ref({});
const search = ref("");
let name = ref("")
let deleteid = ref(0);

 const form = useForm({
    catergory_name:'',
    image:null,
 })

//open create modal
 const openModal=()=>{
   show.value = true
 }

 //handling image change
 const handleChange=(e)=>{

   form.image = e.target.files[0]

    const reader = new FileReader();
      reader.onload = (event) => {
        image_preview.value = event.target.result;
      };
      reader.readAsDataURL(e.target.files[0]);
   

 }

 //close create modal
const closeModal=()=>{
    show.value =false;
    URL.revokeObjectURL(image_preview.value);
    form.reset('catergory_name','image')
}

//  submitting form
const submit=()=>{

form.post('/create/catergory', {
      onFinish: () => {
        form.reset('catergory_name','image')
      }, 
      onSuccess:()=>{
          show.value = false;
          toaster.success("Catergory created successfully");
      },
      onError: (error) => {
        const values = Object.values(error);

        values.forEach(value => {
          toaster.error(value);
        });
      
      },
  });
}


//data table
 const headers = [
          {text:'Id',value:'id',sortable:true},
          {text:"Image",value:"image"},
          {text: 'Catergory name',value: 'catergory_name' },
          {text: 'Created',value: 'created_at' },
          {text: 'Updated',value: 'updated_at' },
          {text:'Action',value:"action"}
    ];
let rows = Catergories

// opens edit modal
const EditModal=(id)=>{

  Category.value = Catergories.filter(category=>{
      return category.id === id
  });

  const {catergory_name,image } = Category.value[0];

  form.catergory_name = catergory_name

  image_preview.value = image;

  showEdit.value = true;
}

// edit form submit
const Editsubmit=()=>{
  const {id} = Category.value[0];
  
  router.post(`/category/update/${id}`,{
    _method:'put',
    catergory_name:form.catergory_name,
    image:form.image,
    onSuccess:()=>{
       showEdit.value=false;
       form.reset('catergory_name','image')
       image_preview = null;
       toaster.success("Catergory updated successfully");
    },
    onError:(error)=>{
      const values = Object.values(error);

        values.forEach(value => {
          toaster.error(value);
        });
    }

  })

}

// show delete confirmation modal
const showDeleteConfirmation=(id)=>{

  Category.value = Catergories.filter(category=>{
      return category.id === id
  });

  const {catergory_name} = Category.value[0];

  name.value = catergory_name;
  deleteid.value = id;

  showConfirmationBox.value = true;
}

// delete category
const DeleteCategory=()=>{

  router.post(`/category/delete/${deleteid.value}`,{
    _method:'delete',
    onSuccess:()=>{
      deleteid.value=0;
      showConfirmationBox.value = false;
      toaster.success("Category deleted successfully")
    },
    onFinish:()=>{
      deleteid.value=0;
    },
    onError:(error)=>{
      deleteid.value=0;

      showConfirmationBox.value = false;

      const values = Object.values(error)

      values.forEach(value=>{
        toaster.error(value)
      })

    }
  })
}

// close edit modal
const closeEditModal=()=>{
  showEdit.value = false;
}

// close delete confirmation modal
const closeConfirmationBox=()=>{
  showConfirmationBox.value = false;
}

</script>

<style>

</style>