<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Home" />

    <AuthenticatedLayout>
        <div
            class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white"
        >
            <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                <template>
                    <Link
                        :href="route('login')"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Log in</Link
                    >

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Register</Link
                    >
                </template>
            </div>

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <Link href="/">
                            <div class="flex justify-between items-center gap-4">
                                <ApplicationLogo
                                class="block h-6 w-auto fill-current text-gray-800"
                                />
                                <p class="border-l border-black pl-4 font-semibold text-xl">Instagram</p>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<style>

</style>
