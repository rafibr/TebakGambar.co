require("./bootstrap");
import Vue from "vue";

import router from "./router/route.js"


Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("header-component", require("./components/Header.vue").default);
Vue.component("footer-component", require("./components/Footer.vue").default);

const app = new Vue({
    el: "#app",
    data: {
        title: "Laravel8 test"
    },
    router
});