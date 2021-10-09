<template>
  <div>
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
              placeholder="foodtruck@example.com"
            />
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
                mb-3
                leading-tight
                focus:outline-none focus:shadow-outline
              "
              id="password"
              v-model="form.password"
              type="password"
              placeholder="******"
            />
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
    <pre>{{ isLoggedIn }}</pre>
    <pre>{{ loginData.userName }}</pre>
    <pre>{{ loginData.userEmail }}</pre>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, ref, inject } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

export default defineComponent({
  name: "Login",
  setup() {
    const router = useRouter();
    const form = reactive({
      userName: "",
      userEmail: "",
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

    return {
      // データ
      form,
      isLoggedIn,
      loginData,
      // 関数
      login,
      getUser,
    };
  },
});
</script>
