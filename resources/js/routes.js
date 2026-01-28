import { createRouter, createWebHistory } from 'vue-router';

import Dashboard from './Pages/Dashboard.vue';

const routes = [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// router.beforeEach((to, from, next) => {
//     const user = window.page.props.auth.user;
//     if (to.meta.requiresAuth && !user) {
//         return next('/login');
//     }
//     next();
// });

export default router;
