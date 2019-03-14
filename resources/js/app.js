
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));
Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('algolia-search', require('./components/AlgoliaSearch.vue'));

const files = require.context('./', true, /\.vue$/i)
const axios = require('axios');
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

const newLocal = '#vue-app';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: newLocal,

    data: {
        messages: []
    },

    created() {
        this.fetchMessages();

        Echo.private('chat').listen('MessageSent', (e) => {
                this.messages.push({
                message: e.message.message,
                user: e.user
            });
        });

    },
    methods: {
        addMessage(message) {
            this.messages.push(message);
            
            axios.post('text', {
                "message": message,
            }).then(response => {
                console.log(response.data);
            }).catch(function (error) {
                console.log(error);
            });
        },
        fetchMessages() {
            axios.get('/texts').then(response => {
                this.messages = response.data;
            }).catch(function (error) {
                console.log(error);
            });;
        }
    }
});
