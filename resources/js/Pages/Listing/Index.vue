<script setup>
import Listing from "@/Pages/Listing/Index/Components/Listing.vue";
import Pagination from "@/Components/UI/Pagination.vue";

defineProps({
    listings: Object,
})
</script>

<template>
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Listing v-for="listing in listings.data" :listing="listing" :key="listing.id" />
</div>
<div v-if="listings.data.length" class="w-full flex justify-center mt-8 mb-8">
    <Pagination :links="listings.links" />
</div>
</template>

<style scoped>

</style>
