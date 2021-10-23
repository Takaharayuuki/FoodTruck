<template>
  <div>
    <div class="flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
      <div class="w-full max-w-lg mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <h2 class="mb-6 pb-6 border-b text-center text-2xl font-extrabold text-gray-900">新規登録</h2>
          <div class="text-left mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="userEmail"> メールアドレス </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="userEmail" v-model="formData.userEmail" type="email" placeholder="foodtruck@example.com" @focus="resetError" />
            <span class="text-red-600" v-if="errors.email !== ''">{{ errors.email }}</span>
          </div>
          <div class="text-left mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="userName"> 名前 </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="userName" v-model="formData.userName" type="text" placeholder="田中 太郎" @focus="resetError" />
            <span class="text-red-600" v-if="errors.name !== ''">{{ errors.name }}</span>
          </div>
          <div class="text-left mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password"> パスワード </label>
            <input class="shadow appearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" v-model="formData.password" type="password" placeholder="******" @focus="resetError" />
            <span class="text-red-600" v-if="errors.password !== ''">{{ errors.password }}</span>
          </div>
          <div class="text-left mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="userEmail"> サムネイル画像 </label>
            <input type="file" @change="onFileSelected($event)" />
          </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-1/2 mr-1" type="button" @click="signUp">登録する</button>
            <router-link class="inline-block font-bold text-center text-sm text-blue-500 hover:text-blue-800 rounded w-1/2 py-2 px-4 border border-blue-500" to="/login"> ログイン </router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, reactive, inject, ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import { useSwal } from '../composable';

interface HTMLElementEvent<T extends HTMLElement> extends Event {
  target: T;
}

export default defineComponent({
  name: 'Register',
  setup() {
    const Swal: any = useSwal();
    const router = useRouter();
    const formData = reactive({
      userEmail: '',
      userName: '',
      password: '',
      userType: 'customer',
    });
    const thumbnailFile = ref();

    const errors = reactive({
      name: '',
      email: '',
      password: '',
    });

    /* ログインの有無 */
    const isLoggedIn: any = inject('isLoggedIn');

    /* ログインしたユーザの情報 */
    const loginData: any = inject('loginData');

    /* 新規登録 */
    function signUp() {
      const form = new FormData();
      // axiosの設定
      const config = {
        headers: {
          'content-type': 'multipart/form-data',
        },
      };
      form.append('file', thumbnailFile.value);
      form.append('email', formData.userEmail);
      form.append('name', formData.userName);
      form.append('password', formData.password);
      form.append('userType', formData.userType);
      axios
        .post('api/register', form, config)
        .then((response) => {
          // 新規登録が正常に完了したらログインしてTopへ
          axios
            .get('sanctum/csrf-cookie', { withCredentials: true })
            .then((response) => {
              axios
                .post('api/auth/login', {
                  email: formData.userEmail,
                  password: formData.password,
                })
                .then((response) => {
                  Swal.fire({
                    icon: 'success',
                    title: '登録完了',
                    text: '新規登録が完了しました。',
                  });
                  getUser();
                  isLoggedIn.value = true;
                  router.push('/');
                })
                .catch((error) => {
                  Swal.fire({
                    icon: 'error',
                    title: '登録失敗',
                    text: '登録を失敗しました。',
                  });
                  isLoggedIn.value = false;
                });
            })
            .catch((error) => {
              console.log(`csrfの方:  ${error}  `);
            });
        })
        .catch((error) => {
          if (error.response.data.errors.email) {
            errors.email = error.response.data.errors.email[0];
          }
          if (error.response.data.errors.name) {
            errors.name = error.response.data.errors.name[0];
          }
          if (error.response.data.errors.password) {
            errors.password = error.response.data.errors.password[0];
          }
        });
    }

    function getUser() {
      axios
        .get('api/user', { withCredentials: true })
        .then((response) => {
          loginData.userEmail = response.data.email;
          loginData.userName = response.data.name;
          loginData.userType = response.data.userType;
        })
        .catch((error) => {
          Swal.fire({
            icon: 'error',
            title: '登録失敗',
            text: '登録を失敗しました。',
          });
          isLoggedIn.value = false;
        });
    }

    // 画像アップロード関連
    function onFileSelected(event: HTMLElementEvent<HTMLInputElement>) {
      if (event.target.files !== null) {
        thumbnailFile.value = event.target.files[0];
      }
    }

    function resetError() {
      errors.name = '';
      errors.email = '';
      errors.password = '';
    }

    return {
      // データ
      formData,
      errors,
      // 関数
      signUp,
      resetError,
      onFileSelected,
    };
  },
});
</script>
