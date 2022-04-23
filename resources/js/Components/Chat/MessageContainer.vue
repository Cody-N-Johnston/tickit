<script setup>
import Message from '@/Components/Chat/Message.vue'

const props = defineProps({
  messages: Array
})
</script>

<template>
  <div class="pt-4 mb-1 flex-1 pb-10">
    <Message v-for="message in messages"
             :id="message.id"
             :sender="message.user_name"
             :created-at="message.created_at"
             :message="message.message"
             :attachment-id="message.attachment_id"
             :attachment-location="message.attachment_location"
             :attachment-name="message.attachment_name"
    />
  </div>
</template>

<style scoped>

</style>