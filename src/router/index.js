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
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
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
