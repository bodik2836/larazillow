<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from "vue"

const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)

</script>

<template>
<div>
    <Link href="/listings">Listings</Link>&nbsp;
    <Link href="/listings/create">New Listing</Link>

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
