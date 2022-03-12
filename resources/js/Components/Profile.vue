<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import {
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'
</script>

<template>
  <Menu as="div" class="ml-3 relative">
    <div>
      <MenuButton class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <span class="sr-only">Open user menu</span>
        <img class="h-8 w-8 rounded-full" src="http://gravatar.com/avatar/0d6ce1ce42ec4aad53d253c1850b3bb4" alt="" />
      </MenuButton>
    </div>
    <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
      <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
        <MenuItem v-slot="{ active }">
          <Link :href="route('profile')" method="get" as="button" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your Profile</Link>
        </MenuItem>
        <MenuItem v-slot="{ active }">
          <Link :href="route('settings')" method="get" as="button" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Settings</Link>
        </MenuItem>
        <MenuItem v-slot="{ active }">
          <Link :href="route('logout')" method="post" as="button" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Sign out</Link>
        </MenuItem>
      </MenuItems>
    </transition>
  </Menu>
</template>

<style scoped>

</style>