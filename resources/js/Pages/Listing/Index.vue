<script setup>
import Listing from "@/Pages/Listing/Index/Components/Listing.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import Filters from "@/Pages/Listing/Index/Components/Filters.vue";

defineProps({
    listings: Object,
    filters: Object,
})
</script>

<template>
    <Filters :filters="filters" />
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Listing v-for="listing in listings.data" :listing="listing" :key="listing.id" />
    </div>
    <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
        <Pagination :links="listings.links" />
    </div>
</template>

<style scoped>

</style>
