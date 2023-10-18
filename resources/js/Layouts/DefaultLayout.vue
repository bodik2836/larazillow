<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from "vue";

const timer = ref(0)

setInterval(() => timer.value++, 1000)
</script>

<template>
<div>
    <Link href="/">Index Page</Link>&nbsp;
    <Link href="/hello">Show Page</Link>
    <div>
        Timer: {{ timer }}
    </div>

    <slot></slot>
</div>
</template>

<style scoped>

</style>
