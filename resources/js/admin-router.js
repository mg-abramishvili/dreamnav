import { createRouter, createWebHistory } from 'vue-router'

import Home from './components/admin/Home.vue'

import Pages from './components/admin/pages/Index.vue'
import PageMaster from './components/admin/pages/Master.vue'

import Schemes from './components/admin/schemes/Index.vue'
import SchemeMaster from './components/admin/schemes/Master.vue'

const routes = [
    {
        path: '/admin',
        name: 'Home',
        component: Home
    },
    {
        path: '/admin/pages',
        name: 'Pages',
        component: Pages
    },
    {
        path: '/admin/page-master/:id?',
        name: 'PageMaster',
        component: PageMaster
    },
    {
        path: '/admin/schemes',
        name: 'Schemes',
        component: Schemes
    },
    {
        path: '/admin/scheme-master/:id?',
        name: 'SchemeMaster',
        component: SchemeMaster
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})