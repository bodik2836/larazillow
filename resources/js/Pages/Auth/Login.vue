<script setup>
import {useForm, Link} from "@inertiajs/vue3";

const form = useForm({
    email: null,
    password: null,
})

const fillTestCred = () => {
    form.email = "test@mail.loc"
    form.password = "password"
}

const login = () => form.post(route('login.store'))
</script>

<template>
    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto">
            <div>
                <label for="email" class="label">E-mail</label>
                <input type="email" id="email" v-model="form.email" class="input" />
                <div class="input-error" v-if="form.errors.email">
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="mt-4">
                <label for="password" class="label">Password</label>
                <input type="password" id="password" v-model="form.password" class="input" />
                <div class="input-error" v-if="form.errors.password">
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn-primary w-full">Login</button>
                <div class="mt-2 text-center">
                    <Link :href="route('user-account.create')" class="text-sm text-gray-500">
                        Need an account? Click here.
                    </Link>
                    <p @click="fillTestCred" class="mt-2 text-sm text-gray-500 cursor-pointer">
                        Or you can use test account. Click here.
                    </p>
                </div>
            </div>
        </div>
    </form>
</template>

<style scoped>

</style>
