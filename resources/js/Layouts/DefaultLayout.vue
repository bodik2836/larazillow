<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import {computed, ref} from "vue"

const page = usePage()
const flashSuccess = computed(() => page.props.flash.success)

const user = computed(() => page.props.user)
const notificationCount = computed(() => Math.min(page.props.user.notificationCount, 9))

let showMenu = ref(false);
const toggleNav = () => (showMenu.value = !showMenu.value);
</script>

<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex flex-wrap items-center justify-between">
                <div class="text-lg font-medium hidden md:block">
                    <Link :href="route('listings.index')">Listings</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listings.index')">LaraZillow</Link>
                </div>
                <button @click="toggleNav" data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                <div :class="showMenu ? 'block': 'hidden'" class="w-full md:block md:w-auto mt-2 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700" id="navbar-default">
                    <div v-if="user" class="flex items-center justify-between p-3 md:p-0 gap-4">
                        <div>
                            <Link :href="route('notifications.index')" class="text-gray-500 relative pr-2 py-2 text-lg">
                                🔔
                                <div v-if="notificationCount" class="absolute right-0 top-0 w-5 h-5 bg-red-700 dark:bg-red-400 text-white font-medium border border-white dark:border-gray-900 rounded-full text-xs text-center">
                                    {{ notificationCount }}
                                </div>
                            </Link>
                            <Link class="text-sm text-gray-500" :href="route('realtor.listings.index')">{{ user.name }}</Link>
                        </div>
                        <Link :href="route('realtor.listings.create')" class="block py-2 px-2 btn-primary">+ New Listing</Link>
                        <div>
                            <Link :href="route('logout')" method="delete" as="button" class="py-2 px-2">Logout</Link>
                        </div>
                    </div>
                    <div v-else class="flex items-center justify-around p-2 md:p-0 gap-2">
                        <Link :href="route('user-account.create')" class="block py-2 px-2">Register</Link>
                        <Link :href="route('login')" class="block py-2 px-2">Sign-In</Link>
                    </div>
                </div>

            </nav>
        </div>
        <div class="container mx-auto">

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
