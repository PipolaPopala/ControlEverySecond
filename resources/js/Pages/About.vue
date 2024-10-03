<script setup>
defineProps({
    user: String
})
</script>

<template>
    <Head>
        <title>About</title>
        <meta head-key="description" name="description" content="This is about page  description">
    </Head>

    <h1>
        About {{ user }}
    </h1>
</template>
