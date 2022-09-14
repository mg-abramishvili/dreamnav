import { createRouter, createWebHistory } from 'vue-router'

import Home from './components/front/Home.vue'

import Routes from './components/front/Routes.vue'

import Page from './components/front/Page.vue'

const routes = [
    {
        path: '/k/:kiosk',
        name: 'Home',
        component: Home
    },
    {
        path: '/k/:kiosk/routes',
        name: 'Routes',
        component: Routes
    },
    {
        path: '/k/:kiosk/page/:id',
        name: 'Page',
        component: Page
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})