require('./bootstrap');

window.Vue = require('vue');

Vue.component('Recipe', require('./components/Recipe.vue'));
Vue.component('profile', require('./components/User/Profile.vue'));
Vue.component('admin', require('./components/Admin/Index.vue'));

const app = new Vue({
    el: '#app',
});
