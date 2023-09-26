<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    caption: '',
    img: null,
});

const submit = () => {
    form.post(route('p.store'));
};
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="caption" value="Caption" />

                <TextInput
                    id="caption"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.caption"
                    autofocus
                    autocomplete="caption"
                />

                <InputError class="mt-2" :message="form.errors.caption" />
            </div>

            <div>
                <InputLabel for="image" value="Image" />

                <TextInput
                    id="image"
                    type="file"
                    class="mt-1 block w-full"
                    v-model="form.image"
                    autofocus
                    autocomplete="image"
                />

                <InputError class="mt-2" :message="form.errors.image" />
            </div>

            <div class="flex items-center justify-start mt-4">
                <PrimaryButton class="" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Post!
                </PrimaryButton>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
