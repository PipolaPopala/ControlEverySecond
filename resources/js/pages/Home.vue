<script setup>
// import Layout from "../layouts/Layout.vue"
// defineOptions({layout: Layout}) // если для конкретной странице нужно задать конкретный лейаут

</script>

<template>
<!--    <Head title="Home"/> // если внутри нужен только заголовок, то можно соратить вот так -->
<!--    <Head :title="$page.component"/> // если внутри нужен только заголовок, то можно соратить вот так -->
    <Head>
        <title>{{$page.component}}</title>
        <meta head-key="description" name="description" content="This is home page description">
    </Head>

    <h1>Home page</h1>
</template>
