<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="ShowPost" />

    <AuthenticatedLayout>

        <div class="flex justify-center items-center h-[calc(100vh-20vh)]">
            <div class="grid grid-cols-2 border border-black/10">
                <img
                    :src="($page.props.post.image.startsWith('https://via.placeholder.com')) ? $page.props.post.image : '/storage/' + $page.props.post.image" 
                    :alt="$page.props.post.caption"
                >
                <div class="bg-white p-4">
                    <div class="flex items-center gap-4 mb-8">
                        <img class="rounded-full w-10 h-10"
                        :src="($page.props.user.profile.image.startsWith('https://via.placeholder.com')) ? $page.props.user.profile.image : '/storage/' + $page.props.user.profile.image" 
                        :alt="$page.props.user.username">
                        

                        <a class="font-bold" :href="'/profile/' + $page.props.user.id">{{ $page.props.user.username }}</a>
                    </div>

                    <p class="mb-6"><a class="font-bold" :href="'/profile/' + $page.props.user.id">{{ $page.props.user.username }}</a> {{ $page.props.post.caption }}</p>

                    <p class="mb-6"><a class="font-bold" :href="'/profile/' + $page.props.user.id">helioLJ</a> Comments here some day</p>
                </div>

                <!-- <div>Likes and etc</div> -->
            </div>
        </div>

    </AuthenticatedLayout>
</template>
