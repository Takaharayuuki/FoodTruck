import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import './assets/style/tailwind.css';
import CommonHeader from './components/common/CommonHeader.vue';
import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading';

createApp(App).component('common-header', CommonHeader).use(router).use(VueLoading).mount("#app");
