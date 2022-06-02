

require('./bootstrap');

window.Vue = require('vue');

Vue.component('all-Registers', require('./components/allRegisters.vue'));
Vue.component('usuario-1',require('./components/home_usuario.vue').default);
const app = new Vue({
    el: '#app',
});
