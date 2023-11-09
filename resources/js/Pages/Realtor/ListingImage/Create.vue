<script setup>
import Box from "@/Components/UI/Box.vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    listing: Object,
})

const form = useForm({
    images: [],
})

const upload = () => {
    form.post(
        route('realtor.listings.image.store', {listing: props.listing.id}),
        {
            onSuccess: () => reset(),
        }
    )
}
const addFiles = (e) => {
    for (const image of e.target.files) {
        form.images.push(image)
    }
}
const reset = () => form.reset('images')
</script>

<template>
<Box>
    <template #header>
        Upload new images
    </template>
    <form @submit.prevent="upload">
        <input type="file" multiple @input="addFiles">
        <button type="submit" class="btn-outline">Upload</button>
        <button type="reset" class="btn-outline" @click="reset">Reset</button>
    </form>
</Box>
</template>

<style scoped>

</style>
