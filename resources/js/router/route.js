import Vue from "vue";

import VueRouter from "vue-router";
Vue.use(VueRouter);

const Home = require("../pages/Home.vue").default;
const About = require("../pages/About.vue").default;
import NotFound from "../pages/NotFound.vue";
import User from "../pages/User.vue";
import Profile from "../pages/Profile.vue";

const route = [{
        name: "Home",
        path: "/home",
        component: Home
    },
    {
        name: "About",
        path: "/about",
        component: About
    },
    {
        name: "User",
        path: "/user",
        component: User
    },
    {
        name: "Profile",
        path: "/user/:id",
        component: Profile,
        props: true
    },
    {
        path: "*",
        component: NotFound
    }
];

const router = new VueRouter({
    linkActiveClass: 'active',
    mode: "history",
    routes: route
});

export default router;