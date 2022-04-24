<script setup>
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { useForm } from '@inertiajs/inertia-vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  terms: false,
});

const submit = () => {
  form.post(route('users.store'), {
    onFinish: () => form.reset("password", "password_confirmation", "name", "email"),
  });
};

const props = defineProps({
  open: Boolean,
  errors: Object
})

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
            <DialogTitle class="text-2xl leading-6 font-semibold text-gray-900">Create User</DialogTitle>

<!--            <BreezeValidationErrors class="mb-4" />-->

            <form @submit.prevent="submit">
              <div>
                <BreezeLabel for="name" value="Name" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
              </div>

              <div class="mt-4">
                <BreezeLabel for="email" value="Email" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
              </div>

              <div class="mt-4">
                <BreezeLabel for="password" value="Password" />
                <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
              </div>

              <div class="mt-4">
                <BreezeLabel for="password_confirmation" value="Confirm Password" />
                <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
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
