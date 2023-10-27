<script setup>
import {useForm} from "@inertiajs/vue3";

const form = useForm({
    email: null,
    password: null,
})

const login = () => form.post(route('login.store'))
</script>

<template>
    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto">
            <div>
                <label for="email" class="label">E-mail (username)</label>
                <input type="email" id="email" v-model="form.email" class="input" />
                <div class="input-error">errors</div>
            </div>
            <div class="mt-4">
                <label for="email" class="label">Password</label>
                <input type="password" id="password" v-model="form.password" class="input" />
                <div class="input-error">errors</div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn-primary w-full">Login</button>
            </div>
        </div>
    </form>
</template>

<style scoped>

</style>
