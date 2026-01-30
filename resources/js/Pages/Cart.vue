<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import { route } from "ziggy-js";

const props = defineProps({
    cartItems: Array, // each cart item includes `product` relation
});

// Update quantity
const updateQuantity = (cartItem, event) => {
    const quantity = parseInt(event.target.value);
    if (quantity < 1) return;

    window.axios.patch(route('cart.update', cartItem.id), { quantity })
        .then(() => {
            cartItem.quantity = quantity;
        });
};

// Remove item from cart
const removeItem = (cartItem) => {
    window.axios.delete(route('cart.remove', cartItem.id))
        .then(() => {
            const index = props.cartItems.findIndex(item => item.id === cartItem.id);
            if (index !== -1) props.cartItems.splice(index, 1);
        });
};

// Compute total
const total = () => {
    return props.cartItems.reduce((sum, item) => sum + item.quantity * item.product.price, 0);
};
</script>

<template>
    <Head title="Shopping Cart" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Your Cart
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto p-6">
                <div v-if="cartItems.length === 0" class="text-gray-600">
                    Your cart is empty.
                </div>

                <div v-else class="space-y-4">
                    <div
                        v-for="cartItem in cartItems"
                        :key="cartItem.id"
                        class="flex items-center justify-between border rounded p-4"
                    >
                        <div class="flex-1">
                            <h3 class="font-semibold">{{ cartItem.product.name }}</h3>
                            <p>Price: KES {{ cartItem.product.price }}</p>
                        </div>

                        <div class="flex items-center space-x-2">
                            <input
                                type="number"
                                class="border rounded px-2 py-1 w-16"
                                :value="cartItem.quantity"
                                @change="updateQuantity(cartItem, $event)"
                            />
                            <button
                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                                @click="removeItem(cartItem)"
                            >
                                Remove
                            </button>
                        </div>
                    </div>

                    <div class="text-right font-semibold text-lg mt-4">
                        Total: KES {{ total() }}
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
