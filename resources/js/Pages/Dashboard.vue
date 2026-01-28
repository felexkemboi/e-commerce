<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'

const products = ref([
    {
        id: 1,
        name: "Product 1",
        description: "Description of Product 1",
        price: 29.99,
        image: "https://via.placeholder.com/300"
    },
    {
        id: 2,
        name: "Product 2",
        description: "Description of Product 2",
        price: 39.99,
        image: "https://via.placeholder.com/300"
    }
])
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <div
                        v-for="product in products"
                        :key="product.id"
                        class="border rounded-lg p-4 flex flex-col"
                    >
                        <h2 class="text-lg font-semibold mb-2">
                            {{ product.name }}
                        </h2>

                        <p class="text-gray-700 mb-4">
                            {{ product.description }}
                        </p>

                        <div class="mt-auto">
                            <span class="text-xl font-bold text-indigo-600">
                                ${{ product.price.toFixed(2) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
