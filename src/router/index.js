import Vue from "vue";
import VueRouter from "vue-router";
import HomeView from "../views/HomeView.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "home",
        component: HomeView,
    },
    {
        path: "/about",
        name: "about",
        component: () => import("../views/AboutView.vue"),
    },
    {
        path: "/login",
        name: "login",
        component: () => import("../views/LoginView.vue"),
    },
    {
        path: "/manage-tasks",
        name: "manage-tasks",
        component: () => import("../views/ManageTasksView.vue"),
    },
    {
        path: "/staff-survey",
        name: "staff-survey",
        component: () => import("../views/StaffSurveyView.vue"),
    },
    {
        path: "/my-flatlists",
        name: "my-flatlists",
        component: () => import("../views/MyFlatListsView.vue"),
    },
];

const router = new VueRouter({
    routes,
});

export default router;
