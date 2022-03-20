<script setup>
  import { ref } from 'vue'
  import Link from '@/Components/Link.vue'

  defineProps({
    selected: Boolean,
    id: Number,
    name: String,
    title: String,
    email: String,
    group: String,
  })

  const checked = ref(false)

</script>
<template>
  <tr class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
    <td class="relative w-12 px-6 sm:w-16 sm:px-8 text-gray-900">
      {{ name }}
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      {{ email }}
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      {{ group }}
    </td>
    <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
      <Link :href="route('users.edit', id)" >Edit</Link>
    </td>
  </tr>
</template>

