<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from "vue"
// import { ref } from "vue";

// const timer = ref(0)
const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)

// setInterval(() => timer.value++, 1000)
</script>

<template>
<div>
    <Link href="/">Index Page</Link>&nbsp;
    <Link href="/hello">Show Page</Link>
<!--    <div>-->
<!--        Timer: {{ timer }}-->
<!--    </div>-->
    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>

    <slot></slot>
</div>
</template>

<style scoped>
.success {
    background-color: green;
    color: white;
}
</style>
