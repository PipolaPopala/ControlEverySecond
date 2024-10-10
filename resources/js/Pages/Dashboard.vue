<template>
    <div>
        <p class="p-4 bg-green-200 rounded-xl" v-if="$page.props.flash.message">{{ $page.props.flash.message }}</p>
        <h1 class="title">Welcome back {{ $page.props.auth.user.name }}</h1>
    </div>
</template>
