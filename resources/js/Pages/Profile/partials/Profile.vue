<template>
    <Head title="Profile" />

    <AuthenticationCard>
        <Header subtitle="Profile"/>
        <Navbar/>
        <form @submit.prevent="submit">

            <!-- contact information -->

                <div class="mb-4">
                    <InputLabel for="phone" value="Phone number" />
                    <TextInput
                        id="phone"
                        v-model="form.phone_number"
                        type="text"
                        class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                        required
                        placeholder="254 7XX XXX XXX"
                    />
                    <InputError class="mt-2" :message="form.errors.phone_number" />
                </div>

            <div class="mb-4">
                <InputLabel for="county" value="County" />
                <TextInput
                    id="county"
                    v-model="form.county"
                    type="text"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="Kiambu"
                />
                <InputError class="mt-2" :message="form.errors.county" />
            </div>

            <div class="mb-4">
                <InputLabel for="subcounty" value="Sub County" />
                <TextInput
                    id="subcounty"
                    v-model="form.sub_county"
                    type="text"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="Ruiru"
                />
                <InputError class="mt-2" :message="form.errors.sub_county" />
            </div>

            <div class="mb-4">
                <InputLabel for="ward" value="Ward" />
                <TextInput
                    id="ward"
                    v-model="form.ward"
                    type="text"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="Theta"
                />
                <InputError class="mt-2" :message="form.errors.ward" />
            </div>
 
            <div class="mt-6">
                <SecondaryButton type='submit' class="w-full text-base" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                   Save Profile
                </SecondaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import SecondaryButton from '@/Components/SecondaryButton.vue'
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import Header from '@/Components/Header.vue';
import Navbar from '@/Components/Navbar.vue';

import  { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({
    position:"top-right",
    duration:4000,
})


const form = useForm({
    phone_number: '',
    county:'',
    sub_county:'',
    ward:'',
});



const submit=()=>{
    form.post('/create/profile',{
        onSuccess:()=>{
            form.reset('county','phonenumber','subcounty','ward')
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