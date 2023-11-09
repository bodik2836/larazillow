<script setup>
defineProps({
    listing: Object,
})
</script>

<template>
<form :action="route('realtor.listings.image.store', {listing: listing.id})" method="post">
    <input type="file" multiple name="files">
    <button type="submit">Send</button>
</form>
</template>

<style scoped>

</style>
