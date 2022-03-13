<script setup>
import { ref } from 'vue'
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { CalendarIcon, TagIcon, UserCircleIcon } from '@heroicons/vue/solid'

const assignees = [
  { name: 'Unassigned', value: null },
  {
    name: 'Wade Cooper',
    value: 'wade-cooper',
    avatar:
        'https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
  },
  // More items...
]
const labels = [
  { name: 'Unlabelled', value: null },
  { name: 'Engineering', value: 'engineering' },
  // More items...
]
const dueDates = [
  { name: 'No due date', value: null },
  { name: 'Today', value: 'today' },
  // More items...
]

const assigned = ref(assignees[0])
const labelled = ref(labels[0])
const dated = ref(dueDates[0])
</script>

<template>
  <div class="flex flex-nowrap justify-end py-2 px-2 space-x-2 sm:px-3">
    <Listbox as="div" v-model="assigned" class="flex-shrink-0">
      <ListboxLabel class="sr-only"> Assign </ListboxLabel>
      <div class="relative">
        <ListboxButton class="relative inline-flex items-center rounded-full py-2 px-2 bg-gray-50 text-sm font-medium text-gray-500 whitespace-nowrap hover:bg-gray-100 sm:px-3">
          <UserCircleIcon v-if="assigned.value === null" class="flex-shrink-0 h-5 w-5 text-gray-300 sm:-ml-1" aria-hidden="true" />

          <img v-else :src="assigned.avatar" alt="" class="flex-shrink-0 h-5 w-5 rounded-full" />

          <span :class="[assigned.value === null ? '' : 'text-gray-900', 'hidden truncate sm:ml-2 sm:block']">{{ assigned.value === null ? 'Assign' : assigned.name }}</span>
        </ListboxButton>

        <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <ListboxOptions class="absolute right-0 z-10 mt-1 w-52 bg-white shadow max-h-56 rounded-lg py-3 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
            <ListboxOption as="template" v-for="assignee in assignees" :key="assignee.value" :value="assignee" v-slot="{ active }">
              <li :class="[active ? 'bg-gray-100' : 'bg-white', 'cursor-default select-none relative py-2 px-3']">
                <div class="flex items-center">
                  <img v-if="assignee.avatar" :src="assignee.avatar" alt="" class="flex-shrink-0 h-5 w-5 rounded-full" />
                  <UserCircleIcon v-else class="flex-shrink-0 h-5 w-5 text-gray-400" aria-hidden="true" />
                  <span class="ml-3 block font-medium truncate">
                        {{ assignee.name }}
                      </span>
                </div>
              </li>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
    </Listbox>

    <Listbox as="div" v-model="labelled" class="flex-shrink-0">
      <ListboxLabel class="sr-only"> Add a label </ListboxLabel>
      <div class="relative">
        <ListboxButton class="relative inline-flex items-center rounded-full py-2 px-2 bg-gray-50 text-sm font-medium text-gray-500 whitespace-nowrap hover:bg-gray-100 sm:px-3">
          <TagIcon :class="[labelled.value === null ? 'text-gray-300' : 'text-gray-500', 'flex-shrink-0 h-5 w-5 sm:-ml-1']" aria-hidden="true" />
          <span :class="[labelled.value === null ? '' : 'text-gray-900', 'hidden truncate sm:ml-2 sm:block']">{{ labelled.value === null ? 'Label' : labelled.name }}</span>
        </ListboxButton>

        <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <ListboxOptions class="absolute right-0 z-10 mt-1 w-52 bg-white shadow max-h-56 rounded-lg py-3 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
            <ListboxOption as="template" v-for="label in labels" :key="label.value" :value="label" v-slot="{ active }">
              <li :class="[active ? 'bg-gray-100' : 'bg-white', 'cursor-default select-none relative py-2 px-3']">
                <div class="flex items-center">
                      <span class="block font-medium truncate">
                        {{ label.name }}
                      </span>
                </div>
              </li>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
    </Listbox>

    <Listbox as="div" v-model="dated" class="flex-shrink-0">
      <ListboxLabel class="sr-only"> Add a due date </ListboxLabel>
      <div class="relative">
        <ListboxButton class="relative inline-flex items-center rounded-full py-2 px-2 bg-gray-50 text-sm font-medium text-gray-500 whitespace-nowrap hover:bg-gray-100 sm:px-3">
          <CalendarIcon :class="[dated.value === null ? 'text-gray-300' : 'text-gray-500', 'flex-shrink-0 h-5 w-5 sm:-ml-1']" aria-hidden="true" />
          <span :class="[dated.value === null ? '' : 'text-gray-900', 'hidden truncate sm:ml-2 sm:block']">{{ dated.value === null ? 'Due date' : dated.name }}</span>
        </ListboxButton>

        <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <ListboxOptions class="absolute right-0 z-10 mt-1 w-52 bg-white shadow max-h-56 rounded-lg py-3 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
            <ListboxOption as="template" v-for="dueDate in dueDates" :key="dueDate.value" :value="dueDate" v-slot="{ active }">
              <li :class="[active ? 'bg-gray-100' : 'bg-white', 'cursor-default select-none relative py-2 px-3']">
                <div class="flex items-center">
                      <span class="block font-medium truncate">
                        {{ dueDate.name }}
                      </span>
                </div>
              </li>
            </ListboxOption>
          </ListboxOptions>
        </transition>
      </div>
    </Listbox>
  </div>
</template>
