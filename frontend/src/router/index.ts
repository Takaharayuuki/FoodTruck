import { createRouter, createWebHistory, RouteRecordRaw } from "vue-router";

const routes: Array<RouteRecordRaw> = [
  {
    path: "/",
    name: "TopLayout",
    component: () => import('../layouts/top-layout.vue'),
    children: [
      {
        path: '/',
        name: 'Top',
        component: () => import('../views/Top.vue'),
        meta: { title: 'トップページ', desc: '説明' }
      },
      {
        path: "/login",
        name: "Login",
        component: () => import('../views/Login.vue'),
        meta: { title: 'ログインページ', desc: '説明' }
      },
      {
        path: "/register",
        name: "Register",
        component: () => import('../views/Register.vue'),
        meta: { title: '新規登録ページ', desc: '説明' }
      }
    ]
  }
]
const router = createRouter({
  history: createWebHistory('/'),
  routes,
});

export default router;
