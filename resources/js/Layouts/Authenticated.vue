<script setup>
import { ref } from 'vue'
import { Dialog, DialogOverlay, TransitionChild, TransitionRoot } from '@headlessui/vue'
import {
  FolderIcon,
  HomeIcon,
  MenuAlt2Icon,
  UsersIcon,
  XIcon,
} from '@heroicons/vue/outline'

import HeaderMenu from "@/Components/HeaderMenu"
import { Link } from '@inertiajs/inertia-vue3'

const navigation = [
  { name: 'Dashboard', href: "/dashboard", icon: HomeIcon},
  { name: 'Users', href: "/users", icon: UsersIcon },
  { name: 'Tickets', href: "/tickets", icon: FolderIcon },
]

const sidebarOpen = ref(false)
const showingNavigationDropdown = ref(false)
</script>

<template>
  <div class="min-h-full flex">
    <TransitionRoot as="template" :show="sidebarOpen">
      <Dialog as="div" class="fixed inset-0 flex z-40 lg:hidden" @close="sidebarOpen = false">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
          <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75" />
        </TransitionChild>
        <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
          <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800">
            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
              <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                  <span class="sr-only">Close sidebar</span>
                  <XIcon class="h-6 w-6 text-white" aria-hidden="true" />
                </button>
              </div>
            </TransitionChild>
            <div class="flex-shrink-0 flex items-center px-4">
              <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
                <h1 class="text-2xl font-semibold text-white">TickIT</h1>
              </div>
            </div>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
              <nav class="px-2">
                <div class="space-y-1">
                  <Link v-for="item in navigation" :key="item.name" :href="item.href" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    <component :is="item.icon" class="text-gray-400 group-hover:text-gray-300 mr-4 flex-shrink-0 h-6 w-6" aria-hidden="true" />
                    {{ item.name }}
                  </Link>
                </div>
              </nav>
            </div>
          </div>
        </TransitionChild>
        <div class="flex-shrink-0 w-14" aria-hidden="true">
        </div>
      </Dialog>
    </TransitionRoot>

    <div class="hidden lg:flex lg:w-64 lg:fixed lg:inset-y-0">
      <div class="flex-1 flex flex-col min-h-0">
        <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
          <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
            <h1 class="text-2xl font-semibold text-white">TickIT</h1>
          </div>
        </div>
        <div class="flex-1 flex flex-col overflow-y-auto bg-gray-800">
          <nav class="flex-1 px-2 py-4">
            <div class="space-y-1">
              <Link v-for="item in navigation" :key="item.name" :href="item.href" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <component :is="item.icon" class="text-gray-400 group-hover:text-gray-300 mr-3 flex-shrink-0 h-6 w-6" aria-hidden="true" />
                {{ item.name }}
              </Link>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="lg:pl-64 flex flex-col w-0 flex-1">
      <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200">
        <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-900 lg:hidden" @click="sidebarOpen = true">
          <span class="sr-only">Open sidebar</span>
          <MenuAlt2Icon class="h-6 w-6" aria-hidden="true" />
        </button>
        <HeaderMenu />
      </div>
      <main class="flex-1">
        <slot />
      </main>
    </div>
  </div>
</template>
