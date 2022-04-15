<script setup>
import { ref } from 'vue'

const props = defineProps({
  id: Number,
  sender: String,
  message: String,
  createdAt: String
})

const isHovered = ref(false)

function formatCreatedAt() {
  let date = new Date(props.createdAt)

  return date.toLocaleDateString() + " " + date.toLocaleTimeString()
}
</script>

<template>
  <div class="px-4 relative" @mouseover="isHovered = true" @mouseleave="isHovered = false" :class="{'bg-slate-200': isHovered}">
    <div class="flex text-sm mb-3 items-start">
      <div class="flex-1 ml-3">
        <div>
          <span class="font-bold">{{ sender }}</span>
          <span class="text-gray-700 text-xs ml-1">{{ formatCreatedAt(createdAt) }}</span>
        </div>
        <span>{{ message }}</span>
      </div>
    </div>
  </div>
</template>