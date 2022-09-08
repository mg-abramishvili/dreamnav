import './bootstrap'

import { createApp } from 'vue'
import router from './admin-router'

import App from './components/admin/App.vue'

import Loader from './components/admin/Loader.vue'

createApp(App).component('Loader', Loader).use(router).mount('#app')