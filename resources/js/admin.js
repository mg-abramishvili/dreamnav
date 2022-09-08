import './bootstrap'

import { createApp } from 'vue'
import router from './admin-router'

import App from './components/admin/App.vue'

createApp(App).use(router).mount('#app')