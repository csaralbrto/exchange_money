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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("example-component", require("./components/ExampleComponent.vue").default);
Vue.component("login-component", require("./components/LoginComponent.vue").default);
Vue.component("home-component", require("./components/HomeComponent.vue").default);
Vue.component("profile-component", require("./components/ProfileComponent.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import DropDown from "./components/Dropdown.vue";
import Parallax from "./components/Parallax.vue";
import Pagination from "./components/Pagination.vue";
import Slider from "./components/Slider.vue";
import Badge from "./components/Badge.vue";
import NavTabsCard from "./components/cards/NavTabsCard.vue";
import LoginCard from "./components/cards/LoginCard.vue";
import Tabs from "./components/Tabs.vue";
import Modal from "./components/Modal.vue";



export {
    DropDown,
    Parallax,
    Pagination,
    Slider,
    Badge,
    NavTabsCard,
    LoginCard,
    Tabs,
    Modal
};

const app = new Vue({
    el: '#app',
});
