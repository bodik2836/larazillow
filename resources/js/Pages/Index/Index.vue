<script setup>
defineProps({
    message: String
})
</script>

<script>
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

export default {
    layout: DefaultLayout
}
</script>

<template>
    <p>Message: {{ message }}</p>
</template>

<style scoped>

</style>
