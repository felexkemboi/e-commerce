<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    cartActions: Array,
});
</script>

<template>
    <Head title="Cart History" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Cart Action History
                </h2>

                <Link
                    :href="route('dashboard')"
                    class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800"
                >
                    Home
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto bg-white shadow rounded-lg p-6">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left border">Item</th>
                            <th class="px-4 py-2 text-left border">Time</th>
                            <th class="px-4 py-2 text-left border">Action</th>
                            <th class="px-4 py-2 text-left border">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="action in cartActions"
                            :key="action.id"
                            class="hover:bg-gray-50"
                        >
                            <td class="px-4 py-2 border">
                                {{ action.product.name }}
                            </td>
                            <td class="px-4 py-2 border">
                                {{
                                    new Date(action.created_at).toLocaleString(
                                        "en-GB",
                                        {
                                            day: "2-digit",
                                            month: "short",
                                            year: "numeric",
                                            hour: "2-digit",
                                            minute: "2-digit",
                                            hour12: false,
                                        },
                                    )
                                }}
                            </td>
                            <td class="px-4 py-2 border capitalize">
                                {{ action.action }}
                            </td>
                            <td class="px-4 py-2 border">
                                {{ action.quantity }}
                            </td>
                        </tr>

                        <tr v-if="cartActions.length === 0">
                            <td
                                colspan="4"
                                class="text-center py-6 text-gray-500"
                            >
                                No cart activity yet.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
