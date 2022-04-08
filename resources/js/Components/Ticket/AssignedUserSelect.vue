<script setup>
import { computed, ref, watchPostEffect } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { CheckIcon, SelectorIcon } from '@heroicons/vue/solid'
import {
  Combobox,
  ComboboxButton,
  ComboboxInput,
  ComboboxOption,
  ComboboxOptions,
} from '@headlessui/vue'

const props = defineProps({
  userId: Number,
  userName: String,
  users: Array,
  ticket: Object
})

const query = ref('')
const selectedUser = ref(
    !props.userId
        ? {id: null, name: null}
        : {id: props.userId, name: props.userName})
const filteredUsers = computed(() =>
    query.value === ''
        ? props.users
        : props.users.filter((user) => {
          return user.name.toLowerCase().includes(query.value.toLowerCase())
        })
)

const form = useForm({
  ticket: null,
  user: null
})

const submit = () => {
  form.ticket = props.ticket
  form.ticket.assigned_to_user_id = selectedUser.value.id
  form.put('/tickets/update');
};

</script>
<template>
  <form @submit.prevent="submit">
    <Combobox as="div" v-model="selectedUser">
      <div class="relative mt-1">
        <ComboboxInput
            @change="query = $event.target.value"
            :display-value="(user) => user.name"
            class="w-full rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
        />
        <ComboboxButton class="absolute inset-y-0 right-0 flex items-center rounded-r-md px-2 focus:outline-none">
          <SelectorIcon class="h-5 w-5 text-gray-400" aria-hidden="true" />
        </ComboboxButton>

        <ComboboxOptions v-if="filteredUsers" class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
          <ComboboxOption @click="submit" class="absolute" v-for="user in filteredUsers" :key="user.id" :value="user" as="template" v-slot="{ active, selected }">
            <li :class="['relative cursor-default select-none py-2 pl-8 pr-4', active ? 'bg-indigo-600 text-white' : 'text-gray-900']">
            <span :class="['block truncate', selected && 'font-semibold']">
              {{ user.name }}
            </span>

              <span v-if="selected" :class="['absolute inset-y-0 left-0 flex items-center pl-1.5', active ? 'text-white' : 'text-indigo-600']">
              <CheckIcon class="h-5 w-5" aria-hidden="true" />
            </span>
            </li>
          </ComboboxOption>
        </ComboboxOptions>
      </div>
    </Combobox>
  </form>
</template>
