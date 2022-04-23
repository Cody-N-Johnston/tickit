<script setup>
import { ref } from 'vue'
import { CloudDownloadIcon } from '@heroicons/vue/outline'

const props = defineProps({
  id: Number,
  sender: String,
  message: String,
  createdAt: String,
  attachmentId: Number,
  attachmentName: String,
  attachmentLocation: String
})

const isHovered = ref(false)

function formatCreatedAt() {
  let date = new Date(props.createdAt)

  return date.toLocaleDateString() + " " + date.toLocaleTimeString()
}

function downloadFile() {
  const attachment = { attachment: props.attachmentId }
  axios.get(
      route('messages.download', attachment), {responseType: "blob"}
  ).then((response) => {

    const url = window.URL.createObjectURL(response.data);
    const link = document.createElement('a');
    link.href = url;
    link.setAttribute('download', props.attachmentName);
    document.body.appendChild(link);

    link.click();
  })
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
        <div v-if="attachmentId">
          <div class="flex flex-row justify-end">
            <button @click="downloadFile" class="inline-flex items-center justify-center rounded-full h-6 w-6 transition duration-150 ease-in-out text-gray-500 hover:bg-gray-300" preserve-scroll>
              <CloudDownloadIcon class="inline-flex rounded-full h-4 w-4 transition duration-500 ease-in-out text-gray-700"/>
            </button>
            <p class="items-center justify-center text-gray-700 text-xs ml-1">{{ attachmentName }}</p>
          </div>
        </div>
        <span>{{ message }}</span>
      </div>
    </div>
  </div>
</template>