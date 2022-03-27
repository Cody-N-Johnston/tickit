<script setup>
import Link from '@/Components/Link.vue'

defineProps({
  id: Number,
  createdByEmail: String,
  subject: String,
  status: String,
  groupName: String,
  createdBy: String,
  assignedTo: String,
  createdAt: String,
  updatedAt: String,
})

</script>
<template>
  <tr>
    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
      <div class="flex items-center">
        <div class="ml-4">
          <div class="font-medium text-gray-900">{{ createdBy }}</div>
          <div class="text-gray-500">{{ createdByEmail }}</div>
        </div>
      </div>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      <div class="text-gray-900">{{ new Date(createdAt).toDateString() }}</div>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      <div class="text-gray-900">{{ subject }}</div>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{ status }}</span>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ groupName }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"> {{ assignedTo }}</td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      <div class="text-gray-900">{{ new Date(updatedAt).toDateString() + " " + new Date(updatedAt).toLocaleTimeString() }}</div>
    </td>
    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
      <Link href="#" class="text-indigo-600 hover:text-indigo-900"
      >Chat<span class="sr-only">, {{ groupName }}</span></Link
      >
    </td>
  </tr>
</template>
