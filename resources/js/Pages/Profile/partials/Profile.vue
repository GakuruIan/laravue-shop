<template>
    <Head title="Profile" />

    <AuthenticationCard>
        <Header subtitle="Profile"/>
        <Navbar/>
        <form @submit.prevent="submit">

            <!-- personal information -->
            <div class="grid grid-cols-1 md:grid-cols-1 gap-y-4 md:gap-4 py-2">
                <div class="">
                    <InputLabel for="firstname" value="Firstname" />
                    <TextInput
                        id="firstname"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                        required
                        placeholder="firstname"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="">
                    <InputLabel for="lastname" value="Lastname" />
                    <TextInput
                        id="lastname"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                        required
                        placeholder="lastname"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
            </div>

            <!-- contact information -->
            <div class="grid grid-cols-1 md:grid-cols-1 gap-y-4 md:gap-4 py-2">
                <div class="">
                    <InputLabel for="phone" value="Phone number" />
                    <TextInput
                        id="phone"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                        required
                        placeholder="254 7XX XXX XXX"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="">
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                        required
                        placeholder="Doe@gmail.com"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
           </div>

           <div class="grid grid-cols-1 md:grid-cols-3 gap-y-4  py-2">
            <div class="">
                <InputLabel for="county" value="County" />
                <TextInput
                    id="county"
                    v-model="form.email"
                    type="text"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="Kiambu"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="">
                <InputLabel for="subcounty" value="Sub County" />
                <TextInput
                    id="subcounty"
                    v-model="form.email"
                    type="text"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="Ruiru"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="">
                <InputLabel for="ward" value="Ward" />
                <TextInput
                    id="ward"
                    v-model="form.email"
                    type="text"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="Theta"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
           </div>
            <div class="mt-6">
                <SecondaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update
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

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

</script>

<style>

</style>