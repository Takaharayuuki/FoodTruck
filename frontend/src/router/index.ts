import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";
import Home from "../views/Home.vue";
import Login from "../views/Login.vue";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    name: "Home",
    component: Home,
    meta: { title: 'トップページ', desc: '説明' }
  },
  {
    path: "/about",
    name: "About",
    component: () =>
      import("../views/About.vue"),
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: { title: 'ログインページ', desc: '説明' }
  },
];

const router = createRouter({
  history: createWebHistory('/'),
  routes,
});

export default router;
