<script setup>
import DefaultLayout from "../../Layouts/DefaultLayout.vue";
defineProps({
    message: String
})
</script>

<template>
    <DefaultLayout>
        <p>Message: {{ message }}</p>
    </DefaultLayout>
</template>

<style scoped>

</style>
