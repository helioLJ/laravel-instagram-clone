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
                        :href="route('post.create')"
                        :active="route().current('post')"
                    >
                        Add New Post
                    </Link>
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
                <a class="h-[394.68px] w-full" href="#">
                    <img class="w-full h-full" src="https://www.forbes.com/advisor/wp-content/uploads/2022/06/freecodecamp.jpeg.jpg" alt="">
                </a>

                <a class="h-[394.68px] w-full" href="#">
                    <img class="w-full h-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZcgJ4Ar1QX0oTCF4pLRqDYER2JxiASNfS5A&usqp=CAU" alt="">
                </a>

                <a class="h-[394.68px] w-full" href="#">
                    <img class="w-full h-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkRqNcrE6W7FUKwaJ3ELf1VjFtPlvyXTx7Fw&usqp=CAU" alt="">
                </a>


                <a class="h-[394.68px] w-full" href="#">
                    <img class="w-full h-full" src="https://www.freecodecamp.org/news/content/images/2023/08/freeCodeCamp-Press.png" alt="">
                </a>

                <a class="h-[394.68px] w-full" href="#">
                    <img class="w-full h-full" src="https://www.freecodecamp.org/news/content/images/2021/12/Learn_CSS_Transforms_by_Building_a_Penguin__Step_104___freeCodeCamp_org-1.jpg" alt="">
                </a>

                <a class="h-[394.68px] w-full" href="#">
                    <img class="w-full h-full" src="https://guiadeti.com.br/wp-content/uploads/2023/05/freeCodeCamp-1024x676.png" alt="">
                </a>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
