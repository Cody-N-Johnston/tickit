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
             :sender="message.sender"
             :time="message.time"
             :message="message.message"
    />
  </div>
</template>

<style scoped>

</style>