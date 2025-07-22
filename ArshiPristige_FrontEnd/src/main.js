import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import { authStore } from './stores/auth'

import './style.css'

const app = createApp(App)
authStore.initialize()
app.use(router)

app.mount('#app')




