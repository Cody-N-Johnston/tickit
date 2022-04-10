<script setup>
import { PaperClipIcon } from "@heroicons/vue/outline"
import { PaperAirplaneIcon } from "@heroicons/vue/solid"
</script>

<template>
  <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
    <div class="relative flex">
         <span class="absolute inset-y-0 flex items-center">
            <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300">
              <PaperClipIcon class="h-6 w-6 ml-2"/>
            </button>
         </span>
      <input type="text" placeholder="Write your message!" class="w-full focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3 border-transparent focus:border-transparent focus:ring-0">
      <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
        <button type="button" class="inline-flex items-center justify-center rounded-sm px-4 py-3 transition duration-500 ease-in-out text-white bg-indigo-600 hover:bg-indigo-700">
          <PaperAirplaneIcon class="h-6 w-6 ml-2 transform rotate-90"/>
        </button>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>