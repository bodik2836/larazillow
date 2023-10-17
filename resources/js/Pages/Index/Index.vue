<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({
    message: String
})
</script>

<template>
    <div>Index</div>
    <Link href="/hello">Show Page</Link>
    <p>Message: {{ message }}</p>
</template>

<style scoped>

</style>
