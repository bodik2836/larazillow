<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from "vue"

const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)

</script>

<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex item-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listings.index')">Listings</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listings.index')">LaraZillow</Link>
                </div>
                <div>
                    <Link
                        :href="route('listings.create')"
                        class="btn-primary"
                    >+ New Listing</Link>
                </div>
            </nav>
        </div>
    </header>

    <main class="container w-full mx-auto p-4">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{ flashSuccess }}
        </div>

        <slot></slot>
    </main>

</template>

<style scoped></style>
