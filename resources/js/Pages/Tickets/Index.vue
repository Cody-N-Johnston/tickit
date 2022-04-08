<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3'
import TicketTable from '@/Components/Ticket/Table.vue'

defineProps({
  tickets: Object,
  groups: Array,
  ticket_statuses: Array,
  administrators: Array
})
</script>

<template>
  <Head title="Tickets" />
  <AuthenticatedLayout>
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Tickets</h1>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="py-4">
          <TicketTable
              :tickets="tickets"
              :groups="groups"
              :ticket-statuses="ticket_statuses"
              :administrators="administrators"
          />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
