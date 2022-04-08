<script setup>
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  created_by_user_id: null,
  subject: null,
  message: null,
  file: null,
})
const props = defineProps({
  open: Boolean,
  user_id: Number,
  errors: Object
})

const submit = () => {
  form.created_by_user_id = props.user_id

  form.post(route('tickets.store'), {
    onFinish: () => form.reset('file', 'created_by_user_id', 'subject', 'message'),
  });
};



</script>

<template>
  <TransitionRoot as="template" :show="open">
    <Dialog id="createTicketModal" as="div" class="fixed z-10 inset-0 overflow-y-auto">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
          <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </TransitionChild>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden 2xl:inline-block 2xl:align-middle 2xl:h-screen" aria-hidden="true">&#8203;</span>
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 2xl:translate-y-0 2xl:scale-95" enter-to="opacity-100 translate-y-0 2xl:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 2xl:scale-100" leave-to="opacity-0 translate-y-4 2xl:translate-y-0 2xl:scale-95">
          <div class="relative inline-block align-bottom bg-white rounded-2xl px-4 pt-5 pb-4 text-left overflow-hidden shadow-2xl transform transition-all 2xl:my-8 2xl:align-middle 2xl:max-w-2xl 2xl:w-full 2xl:p-6">
            <DialogTitle class="text-2xl leading-6 font-semibold text-gray-900">Create Ticket</DialogTitle>

            <!--    Begin Ticket Form    -->
            <form @submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
              <div class="space-y-8 divide-y divide-gray-200">
                <div>
                  <div>
                    <p class="mt-1 text-sm text-gray-500">Describe your support request.</p>
                  </div>

                  <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                      <label for="subject" class="block text-sm font-medium text-gray-700"></label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> subject/ </span>
                        <input type="text" name="subject" id="subject" autocomplete="subject" v-model="form.subject" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300" />
                      </div>
                    </div>

                    <div class="sm:col-span-6">
                      <label for="about" class="block text-sm font-medium text-gray-700">Ticket Details</label>
                      <div class="mt-1">
                        <textarea id="about" name="about" rows="3" v-model="form.message" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" />
                      </div>
                    </div>

                    <!-- May need to axe this functionality for initial release. -->
                    <div class="sm:col-span-6">
                      <label for="files" class="block text-sm font-medium text-gray-700">Files</label>
                      <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                          <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                          <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                              <span>Upload a file</span>
                              <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                            </label>
                            <p class="pl-1">or drag and drop</p>
                          </div>
                          <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                      </div>
                      <p class="mt-1 text-sm text-gray-500">We only support single file uploads for now :(</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="pt-5">
                <div class="flex justify-end">
                  <button type="button" :disabled="form.processing" @click="$emit('close')" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                  <button type="submit" :disabled="form.processing" @click="$emit('close')" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
              </div>
            </form>
            <!--    End Ticket Form    -->

          </div>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
