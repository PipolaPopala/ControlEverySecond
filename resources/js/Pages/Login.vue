<script setup>
import { useForm } from '@inertiajs/vue3'
import Input from '../Components/Input.vue'

const form = useForm({
    email: null,
    password: null,
    remember: null,
})

const submit = () => {
    console.log(form)
    form.post(route('login'), {
        onError: () => form.reset('password', 'remember')
    })
}
</script>

<template>
    <Head :title="$page.component"/>

    <h1 class="title">Login to your account</h1>

    <form @submit.prevent="submit">
        <div class="mb-6">
            <Input name="email" type="email" v-model="form.email" :message="form.errors.email" />
        </div>

        <div class="mb-6">
            <Input name="password" type="password" v-model="form.password" :message="form.errors.password" />
        </div>

        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center gap-2">
                <label for="remember">Remember me</label>
                <input id="remember" type="checkbox" v-model="form.remember"/>
            </div>
            <p class="text-slate-600">Need an account? <Link :href="route('register')" class="text-link">Register</Link></p>
        </div>

        <div>
            <button class="primary-btn" :disabled="form.processing">Login</button>
        </div>
    </form>
</template>
