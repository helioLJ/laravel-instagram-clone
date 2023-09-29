<script>

export default {
    props: ['userId'],

    methods: {
        followUser() {
            axios.post('/follow/' + this.userId)
                .then(response => {
                    console.log(response);
                });
        }
    }
}

</script>

<template>
    <button
        class="bg-blue-500 rounded cursor-pointer text-white px-4 py-0.5 font-bold"
        @click="followUser"
    >
        follow
    </button>
    <!-- <button
        disabled="form.processing"
        class="bg-gray-200 border border-blue-500 rounded cursor-pointer text-black px-4 py-0.5 font-bold"
        type="submit"
    >
        unfollow
    </button> -->
</template>