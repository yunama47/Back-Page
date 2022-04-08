/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue').default;
 
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 
 import AdminApp from './AdminApp.vue';
 import VueAxios from 'vue-axios';
 import VueRouter from 'vue-router';
 import axios from 'axios';
 import { routes } from './routes';
 import VueSweetalert2 from 'vue-sweetalert2';
 import CKEditor from 'ckeditor4-vue'
 // If you don't need the styles, do not connect
 import 'sweetalert2/dist/sweetalert2.min.css';
 Vue.use(VueRouter);
 Vue.use(VueSweetalert2);
 Vue.use(VueAxios, axios);
 Vue.use( CKEditor );
 Vue.component('pagination', require('laravel-vue-pagination'));
 const router = new VueRouter({
     mode: 'history',
     routes: routes
 });
 
 const adminApp = new Vue({
     el: '#admin',
     router: router,
     render: h => h(AdminApp),
 });