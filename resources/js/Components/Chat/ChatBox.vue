<script setup>
import { PaperClipIcon, XCircleIcon } from "@heroicons/vue/outline"
import { PaperAirplaneIcon, FolderIcon } from "@heroicons/vue/solid"
import { useForm } from '@inertiajs/inertia-vue3'
import { useAttrs, ref } from 'vue'

const attrs = useAttrs()
const fileInput = ref(null)

const form = useForm({
  message: null,
  attachment: null,
  thread: null,
})

const props = defineProps({
  open: Boolean,
  thread: Object,
  errors: Object
})

const submit = () => {
  form.transform((data) => ({
    ...data,
    thread_id: props.thread.id,
  }))
  form.post(route('chat.store'), {
    onFinish: () => {
      form.message = ''
      form.attachment = null
    },
    preserveScroll: true
  });
};

function browseFiles() {
  fileInput.value.click()
}

function fileChosen(event) {
  const files = event.target.files
  form.attachment = files[0]
}

function removeFile() {
  form.attachment = null
  form.errors.attachment = null
}

</script>

<template>
  <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
    <form @submit.prevent="submit">
      <div v-if="form.attachment != null" class="flex flex-col">
        <div class="flex flex-row">
          <FolderIcon class="inline-flexrounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-700" />
          <button type="button" ref="fileInput" @click="removeFile" class="inline-flex items-center justify-center rounded-full h-6 w-6 transition duration-150 ease-in-out text-gray-500 hover:bg-gray-300">
            <XCircleIcon class="inline-flexrounded-full h-4 w-4 transition duration-500 ease-in-out text-gray-700" />
          </button>
        </div>
        <p class="text-gray-700 text-xs">{{ form.attachment.name }}</p>
        <div v-if="form.errors.attachment && form.errors.attachment != null">
          <p class="text-red-500 text-sm">{{form.errors.attachment}}</p>
        </div>
      </div>
        <div class="relative flex">
           <span class="absolute inset-y-0 flex items-center">
              <button name="attachment" type="button" @click="browseFiles" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300">
                <PaperClipIcon class="h-6 w-6 ml-2"/>
              </button>
             <input id="file-upload" ref="fileInput" @change="fileChosen" name="file-upload" type="file" hidden/>
           </span>
          <input id="message" name="message" type="text" v-model="form.message" placeholder="Write your message!" class="w-full focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-md py-3 border-transparent focus:border-transparent focus:ring-0">
          <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
            <button type="submit" class="inline-flex items-center justify-center rounded-sm px-4 py-3 transition duration-500 ease-in-out text-white bg-indigo-600 hover:bg-indigo-700">
              <PaperAirplaneIcon class="h-6 w-6 ml-2 transform rotate-90"/>
            </button>
          </div>
        </div>
    </form>
  </div>
</template>

<style scoped>

</style>