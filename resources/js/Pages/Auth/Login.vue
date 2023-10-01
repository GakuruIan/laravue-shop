<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Header from '../../Components/Header.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue'
import TextInput from '@/Components/TextInput.vue';



import { useStore } from 'vuex';

const store = useStore();

defineProps({
    canResetPassword: Boolean,
    status: String
});


const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
   
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post('/login', {
        onFinish: () => form.reset('password'),

        onSuccess:async(response)=>{
            const user = response.props.auth.user;
            await store.dispatch('setUser',user);
            window.location.href = '/';
        },
        
        onError: (error) => {
          console.error(error);
        },
    });
};

</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

       <Header subtitle="Login to account"/>


        <form @submit.prevent="submit">
            <div class="mt-8">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    autofocus
                    placeholder="Doe@gmail.com"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="my-6">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full placeholder:text-sm placeholder:text-gray-500"
                    required
                    placeholder="password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block my-6">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            
            <div class="my-6">
                <SecondaryButton type="submit" class="w-full " :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                   <p class="text-center">login</p>
               </SecondaryButton>
            </div>
            
            <div class="my-4">
                <Link v-if="true" href="/forgot-password" class="border border-gray-400 text-sm text-gray-600 hover:text-gray-900  focus:outline-none  px-4 py-2 hover:border-gray-600">
                    Forgot your password?
                </Link>
                
            </div>
        </form>
    </AuthenticationCard>
</template>
