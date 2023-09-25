<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="flex items-center mt-7">
            <div class="flex justify-center items-center w-1/4">
                <img class="rounded-full w-40" src="https://play-lh.googleusercontent.com/MoaYYQjGtmGLhG9HbjCDKyj44kwHj1HfbCI2Am70elRm35vJ-u4y4X5uEJjP97MAAsU=w240-h480-rw" alt="">
            </div>
            <div class="w-3/4 space-y-3">
                <div class="flex items-center gap-6">
                    <h1 class="text-xl">Freecodecamp</h1>
                    <button class="bg-blue-500 rounded text-white px-4 py-0.5 font-bold">follow</button>
                </div>
                <div class="flex items-center gap-5">
                    <div>
                        <p><span class="font-bold">153</span> posts</p>
                    </div>
                    <div>
                        <p><span class="font-bold">23k</span> followers</p>
                    </div>
                    <div>
                        <p><span class="font-bold">212</span> following</p>
                    </div>
                </div>
                <div>
                    <p class="font-bold">freeCodeCamp.org</p>
                    <p>We're a global community of millions of people learning to code together. LearnToCodeRPG</p>
                    <a class="text-blue-600" href="https://www.freecodecamp.org/">https://www.freecodecamp.org/</a>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
