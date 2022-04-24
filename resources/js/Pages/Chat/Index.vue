<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import MessageHeader from '@/Components/Chat/MessageHeader.vue'
import MessageContainer from '@/Components/Chat/MessageContainer.vue'
import ChatBox from '@/Components/Chat/ChatBox.vue'
import { Head } from '@inertiajs/inertia-vue3'

const props = defineProps({
  messages: Array,
  thread: Object
})

</script>

<template>
  <Head title="Users" />
  <AuthenticatedLayout>
      <div class="flex flex-1 flex-col py-6" >
        <div class="sticky">
          <MessageHeader :thread="thread" />
        </div>
        <!--    MessageContainer    -->
        <div class="flex-1 flex-col-reverse pb-6 h-full">
          <MessageContainer :messages="messages" />
        </div>
      </div>
    <!--    MessageTextArea    -->
    <div class="flex-1 flex-row fixed bottom-4 w-5/6 pt-8">
      <ChatBox :thread="thread"/>
    </div>
  </AuthenticatedLayout>
</template>
