<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FollowButton from '@/Components/FollowButton.vue';

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
        <template v-slot:aside>
            <aside class="w-[350px] p-4 bg-white border-r border-black/10 min-h-screen">
                <h2 class="text-xl mb-4 font-bold">Users</h2>
                <div v-if="$page.props.auth.user" v-for="user in $page.props.users">
                    <div :key="user.id" v-if="user.id !== $page.props.auth.user.id" class="flex items-center gap-4 mb-4 justify-between">
                        <div class="flex items-center gap-4">
                            <img class="rounded-full w-10" :src="'/storage/' + user.profile.image" :alt="user.username">
                            <a :href="'/profile/' + user.id" class="font-bold">{{ user.username }}</a>
                        </div>
                        <FollowButton :follows="$page.props.follows[user.id]" :userId="user.id" />
                    </div>
                </div>
                <div v-else v-for="user in $page.props.users">
                    <div :key="user.id" class="flex items-center gap-4 mb-4 justify-between">
                        <div class="flex items-center gap-4">
                            <img class="rounded-full w-10" :src="'/storage/' + user.profile.image" :alt="user.username">
                            <a :href="'/profile/' + user.id" class="font-bold">{{ user.username }}</a>
                        </div>
                        <FollowButton :follows="false" :userId="user.id" />
                    </div>
                </div>
            </aside>
        </template>
        <div
            class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center selection:bg-red-500 selection:text-white"
        >
            <!-- Timeline Posts -->
            <div class="flex flex-col items-center">
                <h1 v-if="!$page.props.auth.user" class="text-4xl font-sans mb-5">All posts</h1>
                <h1 v-else class="text-4xl font-sans mb-5">Follower's posts</h1>

                <div class="w-[600px]  overflow-hidden border border-black/10" v-for="post in $page.props.posts.data" :key="post.id" :href="'/post/' + post.id">
                    <a class="block" :key="post.id" :href="'/post/' + post.id">
                        <div class="flex items-center gap-4 p-4">
                            <img class="rounded-full w-10" :src="'/storage/' + post.user.profile.image" :alt="post.user.username">

                            <p>
                                <a class="font-bold" :href="'/profile/' + post.user.id">{{ post.user.username }}</a>
                            </p>
                        </div>

                        <img :src="'/storage/' + post.image" :alt="post.caption">

                        <div class="bg-white p-4">
                            <p class=""><a class="font-bold" :href="'/profile/' + post.user.id">{{ post.user.username }}</a> {{ post.caption }}</p>
                        </div>
                    </a>
                </div>

                <nav class="mt-5">
                    <ul class="flex gap-8">
                        <li class="page-item" :class="{ 'disabled': !$page.props.posts.prev_page_url }">
                            <a class="page-link" @click.prevent="$inertia.visit($page.props.posts.prev_page_url)" href="#" >
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M14.41 16.59L13 18l-6-6 6-6 1.41 1.41L8.83 12z"/>
                                        <path fill="none" d="M0 0h24v24H0V0z"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        
                        <li class="page-item" v-for="page in $page.props.posts.links" :key="page.url" :class="page.active ? 'text-blue-500 font-bold' : ''">
                            <a v-if="!isNaN(page.label)" class="page-link" @click.prevent="$inertia.visit(page.url)" href="#">{{ page.label }}</a>
                        </li>
                        
                        <li class="page-item" :class="{ 'disabled': !$page.props.posts.next_page_url }">
                            <a class="page-link" @click.prevent="$inertia.visit($page.props.posts.next_page_url)" href="#" aria-label="Next">
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M10.59 16.59L12 18l6-6-6-6-1.41 1.41L15.17 12z"/>
                                        <path fill="none" d="M0 0h24v24H0V0z"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </AuthenticatedLayout>

</template>

<style>

</style>
