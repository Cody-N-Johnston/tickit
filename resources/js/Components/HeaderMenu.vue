<script setup>
import Search from "@/Components/Search";
import Profile from "@/Components/Profile"
import Notification from "@/Components/Notification"
</script>

<template>
  <div class="sticky flex-1 px-4 flex justify-between">
    <div class="flex-1 flex">
      <Search />
    </div>
    <div class="ml-4 flex items-center md:ml-6">
      <Notification />
      <Profile />
    </div>
  </div>
</template>

<style scoped>

</style>