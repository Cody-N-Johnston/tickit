<script setup>
import { CheckCircleIcon, XIcon } from '@heroicons/vue/solid'
import {usePage } from '@inertiajs/inertia-vue3'
import {ref, watch, computed } from 'vue'

const show = ref(false)

const messages = computed(() => usePage().props.value.flash)

const errors = computed(() => usePage().props.value.errors)
const hasErrors = computed(() => Object.keys(errors.value).length > 0)

watch(messages, async () => {
  if (messages.value.success || messages.value.error) {
    show.value = true
  }
}, {deep: true})

watch(errors, async () => {
  if (hasErrors) {
    show.value = true
  }
}, {deep: true})

</script>

<template>
  <div v-if="messages.success && show">
    <div class="rounded-md bg-green-50 p-4">
      <div class="flex">
        <div class="flex-shrink-0">
          <CheckCircleIcon class="h-5 w-5 text-green-400" aria-hidden="true" />
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-green-800">{{ messages.success }}</p>
        </div>
        <div class="ml-auto pl-3">
          <div class="-mx-1.5 -my-1.5">
            <button @click="show = false" type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
              <span class="sr-only">Dismiss</span>
              <XIcon class="h-5 w-5" aria-hidden="true" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div v-if="hasErrors && show">
    <div class="rounded-md bg-red-50 p-4">
      <div class="flex">
        <div class="flex-shrink-0">
          <CheckCircleIcon class="h-5 w-5 text-red-400" aria-hidden="true" />
        </div>
        <div class="ml-3">
          <ul role="list" class="list-disc pl-5 space-y-1">
            <li v-for="(error, key) in errors" :key="key" class="text-sm font-medium text-red-800">{{ error }}</li>
          </ul>
        </div>
        <div class="ml-auto pl-3">
          <div class="-mx-1.5 -my-1.5">
            <button @click="show = false" type="button" class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-red-600">
              <span class="sr-only">Dismiss</span>
              <XIcon class="h-5 w-5" aria-hidden="true" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
