<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue'
import Header from '@/Components/Header.vue';

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
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

            <SecondaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Resend Verification Email
            </SecondaryButton>

            <div class="mt-4 flex items-center justify-between">
                <div>
                    <Link
                        :href="route('profile.show')"
                        class="border border-gray-300 px-8 py-3  text-sm text-gray-600 hover:bg-indigo-600 hover:text-white rounded-sm focus:outline-none"
                    >
                        Edit Profile</Link>

                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="border border-gray-300 px-8 py-3  text-sm text-gray-600 hover:bg-red-600 hover:text-white rounded-sm focus:outline-none  ml-2"
                    >
                        Log Out
                    </Link>
                </div>
            </div>
        </form>
    </AuthenticationCard>
</template>
