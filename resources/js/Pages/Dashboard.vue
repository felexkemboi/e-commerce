<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    products: Array,
    cartItems: Array,
    user: Object,
});


const isInCart = (productId) => {
    return props.cartItems.includes(productId);
};
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto p-6">
                <div
                    class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6"
                >
                    <div
                        v-for="product in products"
                        :key="product.id"
                        class="border rounded-lg p-4 flex flex-col"
                    >
                        <h2 class="text-lg font-semibold mb-2">
                            {{ product.name }}
                        </h2>

                        <p class="text-gray-600 mb-2">
                            Price: KES {{ product.price }}
                        </p>

                        <button
                            :disabled="isInCart(product.id)"
                            class="mt-4 px-4 py-2 rounded"
                            :class="isInCart(product.id)
                                ? 'bg-gray-400 cursor-not-allowed'
                                : 'bg-black text-white hover:bg-gray-800'"
                        >
                            {{ isInCart(product.id) ? 'In Cart' : 'Add to Cart' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
