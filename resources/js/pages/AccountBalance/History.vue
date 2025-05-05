<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/layouts/AuthLayout.vue';

defineProps<{
    increments: Array<{
        id: number;
        amount: number;
        new_balance: number;
        created_at: string;
    }>;
}>();
</script>

<template>
    <Head title="Balance History" />

    <AuthLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Balance Increment History
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link
                            :href="route('balance.show')"
                            class="inline-flex items-center mb-6 px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        >
                            Back to Balance
                        </Link>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date & Time
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Amount Added
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        New Balance
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="increment in increments" :key="increment.id">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ new Date(increment.created_at).toLocaleString() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">
                                        +{{ increment.amount.toLocaleString() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ increment.new_balance.toLocaleString() }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <p v-if="increments.length === 0" class="mt-4 text-sm text-gray-500">
                            No increments have been processed yet.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AuthLayout>
</template>
