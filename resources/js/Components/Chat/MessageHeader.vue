<script setup>
import { HashtagIcon } from '@heroicons/vue/solid'

const props = defineProps({
  thread: Object,
})

</script>

<template>
  <div class="flex-1 flex-col border-b px-6 py-2">
    <h3 class="mb-1 font-bold text-lg text-gray-900 flex">
      Ticket <HashtagIcon class="pl-1 self-center flex-shrink-0 h-5 w-5"/> {{ thread.id }}
    </h3>
    <div class="text-gray-900 text-sm">
      {{ thread.subject }}
    </div>
  </div>
</template>

<style scoped>

</style>
