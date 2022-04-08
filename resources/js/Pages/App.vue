<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import Register from '@/Components/Register.vue'

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
})
</script>

<template>
    <Head title="Welcome" />
    <BreezeGuestLayout>
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
            Dashboard
          </Link>
          <template v-else>
            <Link :href="route('login')" class="text-sm text-gray-700 underline">
              Log in
            </Link>
            <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
              Register
            </Link>
          </template>
        </div>
      <Register />
    </BreezeGuestLayout>
</template>
