/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('register', require('./components/Register.vue').default);
Vue.component('chat', require('./components/Chat.vue').default);
Vue.component('home', require('./components/Home.vue').default);
Vue.component('account', require('./components/Account.vue').default);
Vue.component('treat', require('./components/treat/Treat.vue').default);
Vue.component('treat-detail', require('./components/treat/TreatDetail.vue').default);
Vue.component('news', require('./components/news/News.vue').default);
Vue.component('pet-show', require('./components/PetShow.vue').default);
Vue.component('doctor', require('./components/doctor/Doctor.vue').default);
Vue.component('doctor-detail', require('./components/doctor/DoctorDetail.vue').default);
Vue.component('ask', require('./components/ask/Ask.vue').default);
Vue.component('ask-detail', require('./components/ask/AskDetail.vue').default);
Vue.component('admin', require('./components/admin/Admin.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import wysiwyg from "vue-wysiwyg";
Vue.use(wysiwyg, {}); // config is optional. more below

import VueBootstrapToasts from "vue-bootstrap-toasts";
Vue.use(VueBootstrapToasts);

const app = new Vue({
    el: '.app',
});
