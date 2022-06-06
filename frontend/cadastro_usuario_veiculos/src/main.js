import { createApp } from 'vue'
import App from './App.vue'

import '../public/css/app.css'
import '../public/js/app'

import Vuex from 'vuex'

Vue.use(Vuex)


createApp(App).mount('#app')
