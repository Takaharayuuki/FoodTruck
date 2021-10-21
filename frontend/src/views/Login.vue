<template>
  <div class="vld-parent">
    <loading
      :active="isLoading"
      :can-cancel="true"
      :is-full-page="true"
      color="#007BFF"
    ></loading>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
      <div class="w-full max-w-lg mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <h2
            class="
              mb-6
              pb-6
              border-b
              text-center text-2xl
              font-extrabold
              text-gray-900
            "
          >
            ログイン
          </h2>
          <div class="text-left mb-4">
            <span class="text-red-600" v-if="errors.message !== ''">{{
              errors.message
            }}</span>
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="userEmail"
            >
              メールアドレス
            </label>
            <input
              class="
                shadow
                appearance-none
                border
                rounded
                w-full
                py-2
                px-3
                text-gray-700
                leading-tight
                focus:outline-none focus:shadow-outline
              "
              id="userEmail"
              v-model="form.userEmail"
              type="text"
              name="email"
              placeholder="foodtruck@example.com"
              @focus="resetError"
            />
            <span class="text-red-600" v-if="errors.email !== ''">{{
              errors.email
            }}</span>
          </div>
          <div class="text-left mb-6">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="password"
            >
              パスワード
            </label>
            <input
              class="
                shadow
                appearance-none
                rounded
                w-full
                py-2
                px-3
                text-gray-700
                leading-tight
                focus:outline-none focus:shadow-outline
              "
              id="password"
              v-model="form.password"
              type="password"
              placeholder="******"
              name="password"
              @focus="resetError"
            />
            <span class="text-red-600" v-if="errors.password !== ''">{{
              errors.password
            }}</span>
          </div>
          <div class="flex items-center justify-between">
            <button
              class="
                bg-blue-500
                hover:bg-blue-700
                text-white
                font-bold
                py-2
                px-4
                rounded
                focus:outline-none focus:shadow-outline
                w-1/2
                mr-1
              "
              type="button"
              @click="login"
            >
              ログイン
            </button>
            <router-link
              class="
                inline-block
                font-bold
                text-center text-sm text-blue-500
                hover:text-blue-800
                rounded
                w-1/2
                py-2
                px-4
                border border-blue-500
              "
              to="/register"
            >
              新規登録
            </router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, ref, inject } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

export default defineComponent({
  name: "Login",
  setup() {
    const router = useRouter();
    const form = reactive({
      userName: "",
      userEmail: "",
      password: "",
    });

    const errors = reactive({
      message: "",
      email: "",
      password: "",
    });
    /* ログインの有無 */
    const isLoggedIn: any = inject("isLoggedIn");
    // ログインしたユーザの情報
    const loginData: any = inject("loginData");

    function login() {
      console.log(form);
      axios
        .get("sanctum/csrf-cookie", { withCredentials: true })
        .then((response) => {
          axios
            .post("api/auth/login", {
              email: form.userEmail,
              password: form.password,
            })
            .then((response) => {
              getUser();
              isLoggedIn.value = true;
              router.push("/");
            })
            .catch((error) => {
              if (
                error.response.data.message === "該当のユーザは存在しません。"
              ) {
                return (errors.message = error.response.data.message);
              }

              if (error.response.data.errors.email) {
                errors.email = error.response.data.errors.email[0];
              }
              if (error.response.data.errors.password) {
                errors.password = error.response.data.errors.password[0];
              }
              isLoggedIn.value = false;
            });
        })
        .catch((error) => {
          console.log(`csrfの方:  ${error}  `);
        });
    }

    function getUser() {
      axios
        .get("api/user", { withCredentials: true })
        .then((response) => {
          loginData.userId = response.data.id;
          loginData.userEmail = response.data.email;
          loginData.userName = response.data.name;
          loginData.userType = response.data.userType;
        })
        .catch((error) => {
          alert(error.response);
          isLoggedIn.value = false;
        });
    }

    function resetError() {
      errors.message = "";
      errors.email = "";
      errors.password = "";
    }

    return {
      // データ
      form,
      isLoggedIn,
      loginData,
      errors,
      // 関数
      login,
      getUser,
      resetError,
    };
  },
  components: {
    Loading,
  },
});
</script>
