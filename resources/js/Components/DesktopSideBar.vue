<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'
const showingNavigationDropdown = ref(false)
import {
  FolderIcon,
  HomeIcon,
  UsersIcon,
  XIcon,
} from '@heroicons/vue/outline'

const navigation = [
  { name: 'Dashboard', href: "/dashboard", icon: HomeIcon},
  { name: 'Users', href: "/users", icon: UsersIcon },
  { name: 'Tickets', href: "/tickets", icon: FolderIcon },
]

</script>

<template>
    <div class="flex-1 flex flex-col min-h-0 bg-gray-800">
      <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
        <h1 class="text-2xl font-semibold text-white">TickIT</h1>
      </div>
      <div class="flex-1 flex flex-col overflow-y-auto">
        <nav class="flex-1 px-2 py-4 space-y-1">
          <Link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
            <component :is="item.icon" :class="[item.current ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
            {{ item.name }}
          </Link>
        </nav>
      </div>
    </div>
</template>
