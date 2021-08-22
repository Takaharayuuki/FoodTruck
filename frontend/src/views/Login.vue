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
    <button @click="getUser">ユーザ情報の取得</button>
    <button @click="logout">ログアウト</button>
    <pre>{{ loggedIn }}</pre>
    <pre>{{ form }}</pre>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, ref } from "vue";
import axios from "axios";

export default defineComponent({
  name: "Login",
  setup() {
    const form = reactive({
      userName: "",
      userEmail: "",
      password: "",
    });

    const loggedIn = ref(false);

    function login() {
      console.log(form);
      axios
        .get("sanctum/csrf-cookie", { withCredentials: true })
        .then((response) => {
          console.log(response);
          axios
            .post("api/auth/login", {
              email: form.userEmail,
              password: form.password,
            })
            .then((response) => {
              console.log(response);
              getUser();
              loggedIn.value = true;
            })
            .catch((error) => {
              console.log(`loginの方${error}`);
              loggedIn.value = false;
            });
        })
        .catch((error) => {
          console.log(`csrfの方:  ${error}  `);
        });
    }
    function logout() {
      axios.post("api/auth/logout", {}).then((response) => {
        console.log(response);
        loggedIn.value = false;
        form.userName = "";
        form.userEmail = "";
        form.password = "";
      });
    }
    function getUser() {
      axios
        .get("api/user", { withCredentials: true })
        .then((response) => {
          form.userEmail = response.data.email;
          form.userName = response.data.name;
          console.log(response.data);
        })
        .catch((error) => {
          alert(error.response);
          loggedIn.value = false;
        });
    }

    return {
      // データ
      form,
      loggedIn,
      // 関数
      login,
      logout,
      getUser,
    };
  },
});
</script>
