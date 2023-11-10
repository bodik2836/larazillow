<script setup>
import Box from "@/Components/UI/Box.vue";
import Price from "@/Components/Price.vue";
import {useForm} from "@inertiajs/vue3";
import {computed, watch} from "vue";
import {debounce} from "lodash";

const props = defineProps({
    listingId: Number,
    price: Number,
})

const emit = defineEmits(['offerUpdated'])

const difference = computed(() => form.amount - props.price)
const min = computed(() => Math.round(props.price / 2))
const max = computed(() => Math.round(props.price * 2))

const form = useForm({
    amount: props.price,
})
const makeOffer = () => form.post(
    route('listings.offer.store', {listing: props.listingId}),
    {preserveScroll: true, preserveState: true}
)

watch(() => form.amount, debounce((value) => emit('offerUpdated', value), 200))
</script>

<template>
<Box>
    <template #header>Make an offer</template>
    <div>
        <form @submit.prevent="makeOffer">
            <input v-model.number="form.amount" type="text" class="input mb-2">
            <input
                v-model.number="form.amount"
                type="range" :min="min" :max="max" step="1000"
                class="w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
            <button type="submit" class="btn-outline w-full mt-2 text-sm">Make an Offer</button>
        </form>
    </div>
    <div class="flex justify-between text-gray-500 mt-2">
        <div>Difference</div>
        <Price :price="difference" />
    </div>
</Box>
</template>

<style scoped>

</style>
