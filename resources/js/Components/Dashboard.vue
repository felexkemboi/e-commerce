<template>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Products</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div v-for="product in products" :key="product.id" class="border rounded-lg p-4 flex flex-col">
                <img :src="product.image" :alt="product.name" class="h-48 w-full object-cover mb-4 rounded">
                <h2 class="text-lg font-semibold mb-2">{{ product.name }}</h2>
                <p class="text-gray-700 mb-4">{{ product.description }}</p>
                <div class="mt-auto">
                    <span class="text-xl font-bold text-indigo-600">${{ product.price.toFixed(2) }}</span>
                </div>
            </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const products = ref([
    {
        id: 1,
        name: "Product 1",
        description: "Description of Product 1",
        price: 29.99,
    },
    {
        id: 2,
        name: "Product 2",
        description: "Description of Product 2",
        price: 39.99,
    }
]);
</script>
