import './bootstrap'

import { createApp } from 'vue'
import router from './admin-router'

import App from './components/admin/App.vue'

import Loader from './components/admin/Loader.vue'

// SweetAlerts
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

createApp(App).component('Loader', Loader).use(router).use(VueSweetalert2).mount('#app')