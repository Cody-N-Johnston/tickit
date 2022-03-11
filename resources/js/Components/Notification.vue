<template>
  <button type="button" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    <span class="sr-only">View notifications</span>
    <BellIcon class="h-6 w-6" aria-hidden="true" />
  </button>
</template>

<script>
import { BellIcon } from '@heroicons/vue/outline'

export default {
  name: "Notification",
  components: {
    BellIcon,
  },
  setup() {
    return {
    }
  },
}
</script>

<style scoped>

</style>