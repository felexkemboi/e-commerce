<template>
  <div>
    <h2>Cart Action History</h2>
    <ul>
      <li v-for="action in cartActions" :key="action.id">
        {{ action.created_at }} - {{ action.product.name }} - {{ action.action }} ({{ action.quantity }})
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    cartActions: Array
});

const cartActions = ref(props.cartActions);
</script>
