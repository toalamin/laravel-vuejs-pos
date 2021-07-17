require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

Vue.use(require("vue-resource"));
//router imported
import { routes } from "./routes";
//import user class
import User from "./Helpers/User";
window.User = User;
//vue pagiation
Vue.component("pagination", require("laravel-vue-pagination"));
//import notification
import Notification from "./Helpers/Notification";
window.Notification = Notification;

//sweet alert start
import Swal from "sweetalert2";
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000
});

window.Toast = Toast;
window.Reload = new Vue();
const router = new VueRouter({
    routes,
    mode: "history"
});

const app = new Vue({
    el: "#app",
    router
});
