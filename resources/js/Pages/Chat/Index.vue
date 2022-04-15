<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import MessageHeader from '@/Components/Chat/MessageHeader.vue'
import MessageContainer from '@/Components/Chat/MessageContainer.vue'
import ChatBox from '@/Components/Chat/ChatBox.vue'
import { Head } from '@inertiajs/inertia-vue3'

const props = defineProps({
  messages: Array
})
const subject = "This is the ticket subject for some shit."
const ticketId = 1

</script>

<template>
  <Head title="Users" />
  <AuthenticatedLayout>
      <div class="flex flex-1 flex-col py-6" >
        <div class="sticky">
          <MessageHeader :subject="subject" :ticket-id="ticketId"/>
        </div>
        <!--    MessageContainer    -->
        <div class="flex-1 flex-col-reverse pb-6 h-full">
          <MessageContainer :messages="messages" />
        </div>
      </div>
    <!--    MessageTextArea    -->
    <div class="flex-1 flex-row fixed bottom-4 w-5/6 pt-8">
      <ChatBox />
    </div>
  </AuthenticatedLayout>
</template>
