import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import './assets/style/tailwind.css';
import CommonHeader from './components/common/CommonHeader.vue';
import VueLoading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading';
import Swal from "./composable/useSwal"

createApp(App).component('common-header', CommonHeader).use(router).use(VueLoading).use(Swal as any).mount("#app");
