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
    ]
  },
  {
    path: "/",
    name: "CommonLayout",
    component: () => import('../layouts/common-layout.vue'),
    children: [
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
      },
      {
        path: "/admin_register",
        name: "AdminRegister",
        component: () => import('../views/AdminRegister.vue'),
        meta: { title: '出店者新規登録ページ', desc: '説明' }
      },
      {
        path: "/store_register",
        name: "StoreRegister",
        component: () => import('../views/store/Register.vue'),
        meta: { title: '出店新規登録ページ', desc: '説明' }
      },
      {
        path: "/store_index",
        name: "StoreIndex",
        component: () => import('../views/store/Index.vue'),
        meta: { title: '出店一覧ページ', desc: '説明' }
      },
      {
        path: "/:id",
        name: "StoreDetail",
        props: true,
        component: () => import('../views/store/Detail.vue'),
        meta: { title: '出店詳細ページ', desc: '説明' }
      },
      {
        path: "/mypage",
        name: "Mypage",
        props: true,
        component: () => import('../views/Mypage.vue'),
        meta: { title: 'ユーザマイページ', desc: '説明' }
      }
    ]
  },
]
const router = createRouter({
  history: createWebHistory('/'),
  scrollBehavior: () => ({ left: 0, top: 0 }),
  routes,
});

export default router;
