<script setup>
  import { ref } from 'vue'

  defineProps({
    selected: Boolean,
    name: String,
    title: String,
    email: String,
    role: String
  })

  const checked = ref(false)

</script>
<template>
  <tr class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">

    <td class="relative w-12 px-6 sm:w-16 sm:px-8 text-gray-900">
      {{ name }}
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      {{ title }}
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      {{ email }}
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      {{ role }}
    </td>
    <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
      <a href="#" class="text-indigo-600 hover:text-indigo-900"
      >Edit<span class="sr-only">, {{ name }}</span></a
      >
    </td>
  </tr>
</template>

