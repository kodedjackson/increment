<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthLayout from '@/layouts/AuthLayout.vue';

const props = defineProps<{
    balance: {
        balance: number;
    };
}>();

const form = useForm({
    balance: props.balance.balance,
});
</script>

<template>
    <Head title="Account Balance" />

    <AuthLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Account Balance
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="form.put(route('balance.update'))" class="space-y-6">
                            <div class="mt-5 mb-5">
                                <label for="balance" class="block text-sm font-medium text-gray-700">
                                    Set Initial Balance
                                </label>
                                <input
                                    id="balance"
                                    v-model="form.balance"
                                    type="number"
                                    step="0.01"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                />
                                <p class="mt-2 text-sm text-gray-500">
                                    Your balance will automatically increase by 1000 every 5 minutes.
                                </p>
                            </div>

                            <div class="flex items-center gap-4">
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                    :disabled="form.processing"
                                >
                                    Save
                                </button>

                                <Link
                                    :href="route('balance.history')"
                                    class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                >
                                    View History
                                </Link>

                                <Transition
                                    enter-active-class="transition ease-in-out"
                                    enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out"
                                    leave-to-class="opacity-0"
                                >
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">
                                        Saved.
                                    </p>
                                </Transition>
                            </div>
                        </form>

                        <div class="mt-8">
                            <h3 class="text-lg font-medium text-gray-900">Current Balance</h3>
                            <p class="mt-2 text-3xl font-bold text-indigo-600">
                                {{ balance.balance.toLocaleString() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthLayout>
</template>
