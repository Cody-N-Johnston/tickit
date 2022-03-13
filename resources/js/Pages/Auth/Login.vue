<script setup>
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import { Head } from '@inertiajs/inertia-vue3'
import Login from '@/Components/Login.vue'
</script>

<template>
    <BreezeGuestLayout>
        <Head title="Log in" />
        <Login />
    </BreezeGuestLayout>
</template>
