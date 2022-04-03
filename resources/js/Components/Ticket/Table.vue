<script setup>
defineProps({
  tickets: Object,
  groups: Array,
  ticketStatuses: Array,
  administrators: Array
})

import TicketRow from '@/Components/Ticket/Row.vue'
import CreateTicketModal from '@/Components/Ticket/CreateTicketModal.vue'
import SimplePagination from '@/Components/SimplePagination.vue'
import FlashMessage from '@/Components/FlashMessage.vue'
import { ref } from 'vue'

const openTicketModal = ref(false)
const createTicketClass = "inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
</script>

<template>
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <FlashMessage />
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <button id="open-ticket-modal" @click="openTicketModal = true" type="button" :class="createTicketClass">Create Ticket</button>
      </div>
    </div>
    <Teleport to="body">
      <CreateTicketModal :open="openTicketModal" :user_id="$page.props.auth.user.id" @close="openTicketModal = false" />
    </Teleport>
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Created By</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Subject</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Group</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Assigned To</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Last Update</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
              <TicketRow v-for="ticketThread in tickets.data"
                         :key="ticketThread.id"
                         :groups="groups"
                         :ticket-statuses="ticketStatuses"
                         :ticket-thread="ticketThread"
                         :administrators="administrators"
              />
              </tbody>
            </table>
          </div>
        </div>
        <SimplePagination
            :prev-page-url="tickets.prev_page_url"
            :next-page-url="tickets.next_page_url"
            :total="tickets.total"
            :from="tickets.from"
            :to="tickets.to"
        />
      </div>
    </div>
  </div>
</template>
