require('./bootstrap');

window.Vue = require('vue');

Vue.component('Welcome', require('./components/Welcome.vue'));

const app = new Vue({
    el: '#app'
});
