import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import './assets/style/tailwind.css';
import CommonHeader from './components/common/CommonHeader.vue'

createApp(App).component('common-header', CommonHeader).use(router).mount("#app");
