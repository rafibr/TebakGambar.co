require("./bootstrap");
import Vue from "vue";
import jQuery from "jquery";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
import router from "./router/route.js";


global.jQuery = jQuery;
global.$ = jQuery;
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);



Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("navbar-component", require("./components/Navbar.vue").default);
Vue.component("brand-component", require("./components/BrandLogo.vue").default);
Vue.component("footer-component", require("./components/Footer.vue").default);


const app = new Vue({
    el: "#app",
    data: {
        title: "Laravel8 test",
        id: document.querySelector("meta[name='user-id']").getAttribute('content')
    },
    router
});