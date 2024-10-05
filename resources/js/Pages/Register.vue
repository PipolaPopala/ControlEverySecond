<script setup>
import { useForm } from '@inertiajs/vue3'
import Input from '../Components/Input.vue'

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})

const submit = () => {
    console.log(form)
    form.post('/register', {
        onError: () => form.reset('password', 'password_confirmation')
    })
}
</script>

<template>
    <Head :title="$page.component"/>

    <h1 class="title">Register a new account</h1>

    <form @submit.prevent="submit">
        <div class="mb-6">
            <Input name="name" v-model="form.name" :message="form.errors.name"/>
        </div>

        <div class="mb-6">
            <Input name="email" type="email" v-model="form.email" :message="form.errors.email" />
        </div>

        <div class="mb-6">
            <Input name="password" type="password" v-model="form.password" :message="form.errors.password" />
        </div>

        <div class="mb-6">
            <Input name="confirmPassword" type="password" v-model="form.password_confirmation" />
        </div>

        <div>
            <p class="text-slate-600 mb-2">Already a user? <a href="#" class="text-link">Login</a></p>
            <button class="primary-btn" :disabled="form.processing">Register</button>
        </div>
    </form>
</template>
