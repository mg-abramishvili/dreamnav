import { createRouter, createWebHistory } from 'vue-router'

import Home from './components/front/Home.vue'
import Routes from './components/front/Routes.vue'

const routes = [
    {
        path: '/kiosk/:id',
        name: 'Home',
        component: Home
    },
    {
        path: '/kiosk/:id/routes',
        name: 'Routes',
        component: Routes
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})