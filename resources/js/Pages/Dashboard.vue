<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { route } from "ziggy-js";

const props = defineProps({
    products: Array,
    cartItems: Array,
    user: Object,
});

const cartItemsLocal = ref([...props.cartItems]);


// Search query
const searchQuery = ref("");

// Filter products by search
const filteredProducts = computed(() => {
    if (!searchQuery.value) return props.products;
    return props.products.filter((product) =>
        product.name.toLowerCase().includes(searchQuery.value.toLowerCase()),
    );
});

// Check if product is already in cart
const isInCart = (productId) => {
    return props.cartItems.includes(productId);
};

// Add product to cart using Inertia POST
const addToCart = (productId) => {
    if (!isInCart(productId)) {
        window.axios.post(route("cart.add", productId)).then(() => {
            // Optimistically update cartItems
            props.cartItems.push(productId);
        });
    }
};
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between space-x-4">
                <!-- Title on far left -->
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Products
                </h2>

                <!-- Search Input in the middle -->
                <input
                    type="text"
                    v-model="searchQuery"
                    placeholder="Search products..."
                    class="flex-1 border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-black mx-4"
                />

                <!-- Cart Button on far right -->
                <Link
                    href="/cart"
                    class="flex items-center space-x-2 bg-black text-white px-4 py-2 rounded hover:bg-gray-800"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            d="M16 11V9a4 4 0 10-8 0v2H5a1 1 0 000 2h1v5a1 1 0 102 0v-5h4v5a1 1 0 102 0v-5h1a1 1 0 100-2h-1z"
                        />
                    </svg>
                    <span>{{ cartItemsLocal.length }}</span>
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto p-6">
                <div
                    class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6"
                >
                    <div
                        v-for="product in filteredProducts"
                        :key="product.id"
                        class="border rounded-lg p-4 flex flex-col"
                    >
                        <h2 class="text-lg font-semibold mb-2">
                            {{ product.name }}
                        </h2>

                        <p class="text-gray-600 mb-2">
                            Price: KES {{ product.price }}
                        </p>

                        <p class="text-gray-500 mb-2">
                            Stock: {{ product.stock_quantity }}
                        </p>

                        <button
                            :disabled="isInCart(product.id)"
                            @click="addToCart(product.id)"
                            class="mt-4 px-4 py-2 rounded"
                            :class="
                                isInCart(product.id)
                                    ? 'bg-gray-400 cursor-not-allowed'
                                    : 'bg-black text-white hover:bg-gray-800'
                            "
                        >
                            {{
                                isInCart(product.id) ? "In Cart" : "Add to Cart"
                            }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
