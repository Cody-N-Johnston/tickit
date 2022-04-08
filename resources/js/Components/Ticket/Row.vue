<script setup>
import Link from '@/Components/Link.vue'
import AssignedUserSelect from '@/Components/Ticket/AssignedUserSelect.vue'
import AssignedGroupSelect from '@/Components/Ticket/AssignedGroupSelect.vue'

defineProps({
  groups: Array,
  ticketStatuses: Array,
  ticketThread: Object,
  administrators: Array
})

</script>
<template>
  <tr>
    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
      <div class="flex items-center">
        <div class="ml-4">
          <div class="font-medium text-gray-900">{{ ticketThread.created_by }}</div>
          <div class="text-gray-500">{{ ticketThread.created_by_email }}</div>
        </div>
      </div>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      <div class="text-gray-900">{{ new Date(ticketThread.created_at).toDateString() }}</div>
    </td>
    <td class="px-3 py-4 text-sm text-gray-500">
      <div class="text-gray-900 ">{{ ticketThread.subject }}</div>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
          <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800"> {{ ticketThread.ticket_status }} </span>
<!--      <TicketSelectMenu />-->
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      <AssignedGroupSelect :groups="groups" :group-id="ticketThread.group_id" :group-name="ticketThread.group" :ticket="ticketThread"/>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
      <AssignedUserSelect :users="administrators" :user-id="ticketThread.assigned_to_user_id" :user-name="ticketThread.assigned_to" :ticket="ticketThread"/>
    </td>
    <td class="px-3 py-4 text-sm text-gray-500">
      <div class="text-gray-900">{{ new Date(ticketThread.updated_at).toDateString() + " " + new Date(ticketThread.updated_at).toLocaleTimeString() }}</div>
    </td>
    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
      <Link href="#" class="text-indigo-600 hover:text-indigo-900"
      >Chat<span class="sr-only">, {{ ticketThread.group_name }}</span></Link
      >
    </td>
  </tr>
</template>
