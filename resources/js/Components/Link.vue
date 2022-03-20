<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps(['href'])

</script>

<template>
  <Link :href="href" class="text-indigo-600 hover:text-indigo-900">
    <slot />
  </Link>
</template>
