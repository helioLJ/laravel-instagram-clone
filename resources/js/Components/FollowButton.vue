<script>

export default {
    props: ['userId', 'follows'],

    data: function () {
        return {
            status: this.follows,
        }
    },

    methods: {
        followUser() {
            axios.post('/follow/' + this.userId)
                .then(response => {
                    this.status = !this.status;
                    console.log(response.data);
                });
        }
    }
}

</script>

<template>
    <button
        class="bg-blue-500 rounded cursor-pointer px-4 py-0.5 font-bold"
        @click="followUser"
        :class="!this.status ? 'bg-blue-500 text-white' : 'bg-gray-200 border border-blue-500 text-black'"
    >
        <span v-if="this.status">following</span>
        <span v-else>follow</span>
    </button>
</template>