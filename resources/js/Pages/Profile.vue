<script setup>
import FollowButton from '@/Components/FollowButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <div class="flex items-center mt-7 ">
            <div class="flex justify-center items-center w-1/4">
                <img class="rounded-full w-40" :src="'/storage/' + $page.props.user.profile.image">
            </div>
            <div class="w-3/4 space-y-3">
                <div class="flex items-baseline justify-between gap-6">
                    <h1 class="text-3xl">{{ $page.props.user.username }}</h1>
                    <div>
                        <div v-if="$page.props.auth.user">
                            <FollowButton :follows="$page.props.follows" :userId="$page.props.user.id" v-if="$page.props.user.id != $page.props.auth.user.id" />
                            <Link
                                v-if="$page.props.user.id == $page.props.auth.user.id"
                                class="text-blue-500 font-bold"
                                :href="route('post.create')"
                            >
                                Add New Post
                            </Link>
                        </div>
                        <div v-else>
                            <FollowButton :follows="$page.props.follows" :userId="$page.props.user.id" />
                        </div>
                    </div>

                </div>
                <div class="flex items-center gap-5">
                    <div>
                        <p><span class="font-bold">{{ $page.props.user.posts.length }}</span> posts</p>
                    </div>
                    <div>
                        <p><span class="font-bold">{{ $page.props.followers }}</span> followers</p>
                    </div>
                    <div>
                        <p><span class="font-bold">{{ $page.props.following }}</span> following</p>
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
