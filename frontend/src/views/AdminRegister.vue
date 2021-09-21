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
            出店者新規登録
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
              v-model="formData.userEmail"
              type="email"
              placeholder="foodtruck@example.com"
            />
          </div>
          <div class="text-left mb-4">
            <label
              class="block text-gray-700 text-sm font-bold mb-2"
              for="userName"
            >
              出店管理者名
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
              id="userName"
              v-model="formData.userName"
              type="text"
              placeholder="田中 太郎"
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
              v-model="formData.password"
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
              @click="signUp"
            >
              登録する
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
              to="/login"
            >
              ログイン
            </router-link>
          </div>
        </form>
        <pre>{{ formData }}</pre>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, inject } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
export default defineComponent({
  name: "AdminRegister",
  setup() {
    const router = useRouter();
    const formData = reactive({
      userEmail: "",
      userName: "",
      password: "",
    });
    /* ログインの有無 */
    const isLoggedIn: any = inject("isLoggedIn");
    /* ログインしたユーザの情報 */
    const loginData: any = inject("loginData");
    /* 新規登録 */
    function signUp() {
      axios
        .post("api/register", {
          email: formData.userEmail,
          name: formData.userName,
          password: formData.password,
        })
        .then((response) => {
          // 新規登録が正常に完了したらログインしてTopへ
          axios
            .get("sanctum/csrf-cookie", { withCredentials: true })
            .then((response) => {
              axios
                .post("api/auth/login", {
                  email: formData.userEmail,
                  password: formData.password,
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
        })
        .catch((err) => {
          console.log(err);
        });
    }
    function getUser() {
      axios
        .get("api/user", { withCredentials: true })
        .then((response) => {
          loginData.userEmail = response.data.email;
          loginData.userName = response.data.name;
        })
        .catch((error) => {
          alert(error.response);
          isLoggedIn.value = false;
        });
    }
    return {
      // データ
      formData,
      // 関数
      signUp,
    };
  },
});
</script>
