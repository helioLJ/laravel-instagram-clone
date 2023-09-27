<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <div class="flex items-center mt-7 ">
            <div class="flex justify-center items-center w-1/4">
                <img class="rounded-full w-40" src="https://play-lh.googleusercontent.com/MoaYYQjGtmGLhG9HbjCDKyj44kwHj1HfbCI2Am70elRm35vJ-u4y4X5uEJjP97MAAsU=w240-h480-rw" alt="">
            </div>
            <div class="w-3/4 space-y-3">
                <div class="flex items-baseline justify-between gap-6">
                    <h1 class="text-3xl">{{ $page.props.user.username }}</h1>
                    <!-- <button class="bg-blue-500 rounded text-white px-4 py-0.5 font-bold">follow</button> -->
                    <Link
                        v-if="$page.props.auth.user"
                        class="text-blue-500 font-bold"
                        :href="route('post.create')"
                    >
                        Add New Post
                    </Link>
                </div>
                <div class="flex items-center gap-5">
                    <div>
                        <p><span class="font-bold">{{ $page.props.user.posts.length }}</span> posts</p>
                    </div>
                    <div>
                        <p><span class="font-bold">23k</span> followers</p>
                    </div>
                    <div>
                        <p><span class="font-bold">212</span> following</p>
                    </div>
                </div>
                <div>
                    <p class="font-bold">{{ $page.props.user.profile.title }}</p>
                    <p>{{ $page.props.user.profile.description }}</p>
                    <a class="text-blue-600" href="https://www.freecodecamp.org/">{{ $page.props.user.profile.url }}</a>
                </div>
            </div>
        </div>

        <div class="border-t border-black/20 mt-12">
            <div class="flex justify-center gap-10 py-5">
                <button>
                    <img src="" alt="">
                    <p>Posts</p>
                </button>

                <button>
                    <img src="" alt="">
                    <p>Tagged</p>
                </button>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <a v-for="post in $page.props.user.posts" :key="post.id" :href="'/post/' + post.id">
                    <img class="" :src="'/storage/' + post.image" :alt="post.caption" />
                </a>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
