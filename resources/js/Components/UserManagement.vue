<script setup>
import UserRow from '@/Components/User/Row.vue'
import CreateUserModal from '@/Components/User/CreateUserModal.vue'
import SimplePagination from "@/Components/SimplePagination.vue"
import FlashMessage from '@/Components/FlashMessage.vue'
import { PlusSmIcon as PlusSmIconOutline } from '@heroicons/vue/outline'
import { ref } from 'vue'

const openUserCreationModal = ref(false)
defineProps({
  users: Object
})
const createUserClass = "inline-flex items-center p-3 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
</script>
<template>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <FlashMessage />
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <button id="open-ticket-modal" @click="openUserCreationModal = true" type="button" :class="createUserClass">
          <PlusSmIconOutline class="h-6 w-6" aria-hidden="true" />
        </button>
      </div>
    </div>
    <Teleport to="body">
      <CreateUserModal :open="openUserCreationModal" @close="openUserCreationModal = false" />
    </Teleport>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full table-fixed divide-y divide-gray-300">
              <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8 text-left text-sm font-semibold text-gray-900">Name</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Group</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                <UserRow v-for="user in users.data"
                  :key="user.id"
                  :id="user.id"
                  :name="user.name"
                  :title="user.title"
                  :email="user.email"
                  :group="user.group"
                />
              </tbody>
            </table>
          </div>
        </div>
       <SimplePagination
         :prevPageUrl="users.prev_page_url"
         :nextPageUrl="users.next_page_url"
         :total="users.total"
         :from="users.from"
         :to="users.to"
       />
      </div>
    </div>
  </div>
</template>