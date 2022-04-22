<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { ArrowSmDownIcon, ArrowSmUpIcon } from '@heroicons/vue/solid'

const stats = [
  { name: 'To Do', stat: '10', previousStat: '3', change: '%', changeType: 'increase' },
  { name: 'Doing', stat: '5', previousStat: '56.14%', change: '2.02%', changeType: 'increase' },
  { name: 'Done', stat: '3', previousStat: '28.62%', change: '4.05%', changeType: 'decrease' },
]

</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
      <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          <div class="py-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Last 30 days</h3>
            <dl class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x">
              <div v-for="item in stats" :key="item.name" class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">
                  {{ item.name }}
                </dt>
                <dd class="mt-1 flex justify-between items-baseline md:block lg:flex">
                  <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                    {{ item.stat }}
                  </div>
                </dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
</template>
