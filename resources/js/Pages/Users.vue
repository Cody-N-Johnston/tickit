<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
  <Head title="Users" />
  <AuthenticatedLayout>
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Users</h1>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
          <div class="border-4 border-dashed border-gray-200 rounded-lg h-96" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
