<script setup>
defineProps({
    name: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: 'text'
    },
    message: String
})

const model = defineModel({
    type: null,
    required: true
})
</script>

<template>
    <label :for="name">{{ name }}</label>
    <input :id="name" :type="type" :name="name" v-model="model" :class="{'!ring-red-500': message}"/>
    <small class="error" v-if="message">{{ message }}</small>
</template>
