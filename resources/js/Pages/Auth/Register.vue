<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Header from '@/Components/Header.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    firstname: '',
    lastname:'',
    email: '',
    password: '',
    password_confirmation: '',
    role:'user'
});

const submit = () => {
    form.post('/register', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        
        <Header subtitle="Register an account"/>
        
        <form @submit.prevent="submit">

            <div class="mt-4">
                <InputLabel for="firstname" value="Firstname" />
                <TextInput
                    id="firstname"
                    v-model="form.firstname"
                    type="text"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="John"
                />
                <InputError class="mt-2" :message="form.errors.firstname" />
            </div>

            <div class="mt-4">
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

            <div class="mt-6">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="Doe@gmail.com"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-6">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="new password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-6">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="confirm password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="mt-6">
                <SecondaryButton type="submit" class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </SecondaryButton>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link  class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                </Link>

                
            </div>
        </form>
    </AuthenticationCard>
</template>
