<script setup>
import { useForm } from '@inertiajs/vue3'
import Input from '@/components/InputCustom.vue'

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
    preview: null,
})

const change = (e) => {
    form.avatar = e.target.files[0]
    form.preview = URL.createObjectURL(e.target.files[0]);
}

const submit = () => {
    console.log(form)
    form.post(route('register'), {
        onError: () => form.reset('password', 'password_confirmation')
    })
}
</script>

<template>
    <Head :title="$page.component"/>

    <h1 class="title">Register a new account</h1>

    <form @submit.prevent="submit">
        <div class="grid place-items-center">
            <div
                class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300"
            >
                <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                    <span class="bg-white/70 pb-2 text-center">Avatar</span>
                </label>
                <input type="file" @input="change" id="avatar" hidden />

                <img
                    class="object-cover w-28 h-28"
                    :src="form.preview ?? 'storage/avatars/default.webp'"
                />
            </div>

            <p class="error mt-2">{{ form.errors.avatar }}</p>
        </div>

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
            <p class="text-slate-600 mb-2">Already a user? <Link :href="route('login')" class="text-link">Login</Link></p>
            <button class="primary-btn" :disabled="form.processing">Register</button>
        </div>
    </form>
</template>
