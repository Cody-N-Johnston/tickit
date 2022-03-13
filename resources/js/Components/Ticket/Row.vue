<script setup>
  import { ref } from 'vue'

  defineProps({
    checked: Boolean,
    name: String,
    title: String,
    email: String,
    role: String
  })

  const checked = ref(false)

</script>
<template>
    <td>
      <div v-if="checked" class="absolute inset-y-0 left-0 w-0.5 bg-indigo-600"></div>
      <input type="checkbox" class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6" :value="email"/>
    </td>
    <td :class="['whitespace-nowrap py-4 pr-3 text-sm font-medium', checked ? 'text-indigo-600' : 'text-gray-900']">
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
</template>

