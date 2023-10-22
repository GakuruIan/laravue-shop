<template>
    <Head title="Update " />

    <AuthenticationCard>
        <Header subtitle="Update Profile"/>
        <Navbar/>
        <form @submit.prevent="submit">

            <!-- contact information -->

                <div class="mb-4">
                    <InputLabel for="Firstname" value="Firstname" />
                    <TextInput
                        id="Firstname"
                        v-model="form.firstname"
                        type="text"
                        class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                        required
                        placeholder="John"
                    />
                    <InputError class="mt-2" :message="form.errors.firstname" />
                </div>

            <div class="mb-4">
                <InputLabel for="lastname" value="Lastname" />
                <TextInput
                    id="lastname"
                    v-model="form.lastname"
                    type="text"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="Doe"
                />
                <InputError class="mt-2" :message="form.errors.lastname" />
            </div>

            <div class="mb-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="text"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="Ruiru"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
 
            <div class="mt-6">
                <SecondaryButton type='submit' class="w-full text-base" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                   Update profile
                </SecondaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

<script setup>
import { Head, useForm ,router } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue'
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import Header from '@/Components/Header.vue';
import Navbar from '@/Components/Navbar.vue';
import {onMounted, ref} from 'vue'

import  { createToaster } from "@meforma/vue-toaster";


const {user,message} = defineProps(['user','message'])

let userID = ref(0)

const toaster = createToaster({
    position:"top-right",
    duration:4000,
})

onMounted(()=>{
    form.firstname = user.firstname
    form.lastname = user.lastname
    form.email = user.email
    userID.value = user.id
})

const form = useForm({
    firstname: '',
    lastname:'',
    email: '',
});

const submit=()=>{
   
    router.post(`/update/user/${userID.value}`,{
        _method:'put',
        firstname:form.firstname,
        lastname:form.lastname,
        email:form.email,
        onSuccess:()=>{
            toaster.success("Profile updated successfully")
        },
        onError:(error)=>{
          const values = Object.values(error)
             values.forEach(value=>{
             toaster.error(value)
          })
        }
    })
}

</script>

<style>

</style>