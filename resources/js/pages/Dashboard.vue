<!-- resources/js/Pages/Dashboard.vue -->
<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AuthLayout from '@/layouts/AuthLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    balance?: {
        balance: number;
        user_id: number;
    };
}>();
</script>

<template>
    <Head title="Dashboard" />

    <AuthLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div v-if="balance" class="mb-8">
                            <h3 class="text-lg font-medium text-gray-900">Your Account Balance</h3>
                            <p class="mt-2 text-3xl font-bold text-indigo-600">
                                {{ balance.balance.toLocaleString() }}
                            </p>
                            <p class="mt-2 text-sm text-gray-500">
                                This balance increases by 1000 every 5 minutes automatically.
                            </p>
                            <div class="mt-4 mx-auto content-center text-center">
                                <Link
                                    :href="route('balance.show')"
                                    class="mb-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                >
                                    Manage Balance
                                </Link>
                                <Link
                                    :href="route('balance.history')"
                                    class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                >
                                    View History
                                </Link>
                            </div>
                        </div>
                        <div v-else>
                            <p>You haven't set up your account balance yet.</p>
                            <Link
                                :href="route('balance.show')"
                                class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                Set Up Balance
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthLayout>
</template>
