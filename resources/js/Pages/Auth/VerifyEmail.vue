<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue'
import Header from '@/Components/Header.vue';

import  { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({
    position:"top-right",
    duration:4000,
})

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'),{
        onSuccess:()=>{
            toaster.success("verification-link-sent")
        },
        onError:(error)=>{
            toaster.error(error)
        }
    });
};

</script>

<template>
    <Head title="Email Verification" />

       

    <AuthenticationCard>
      
        <Header subtitle="Email Verification"/>

        <div class="mb-4 text-sm text-gray-600">
            Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
        </div>

        <div v-if="verificationLinkSent" class="mb-4 font-medium text-sm text-green-600">
            A new verification link has been sent to the email address you provided in your profile settings.
        </div>

        <form @submit.prevent="submit">

            <SecondaryButton type="submit" class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Resend Verification Email
            </SecondaryButton>

        </form>
    </AuthenticationCard>
</template>
