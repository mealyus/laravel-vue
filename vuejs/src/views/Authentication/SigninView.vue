<template>
  <div class="flex items-center my-8 max-w-7xl m-auto">
      <div>
        <!-- Breadcrumb End -->
        <BreadcrumbDefault :pageTitle="pageTitle" />
        <!-- Breadcrumb Start -->
        <DefaultAuthCard subtitle="User Authentication" title="Sign In">
          <form @submit.prevent="loginUser">
            <div class="my-4">
              <input type="email" v-model="user.email" placeholder="Enter your E-Mail" class="w-full rounded border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
            </div>
            <div div class="my-4">
              <input type="password" v-model="user.password" placeholder="Password" class="w-full rounded border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
            </div>
            
    
            <button
              class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90"
            >
              Sign In
            </button>
    
            <div class="mt-6 text-center">
              <p class="font-medium">
                Don’t have any account?
                <router-link to="/auth/signup" class="text-primary">Sign up</router-link>
              </p>
            </div>
          </form>
        </DefaultAuthCard>
      </div>
    </div>
</template>

<script setup lang="ts">
  import DefaultAuthCard from '@/components/Auths/DefaultAuthCard.vue'
  import BreadcrumbDefault from '@/components/Breadcrumbs/BreadcrumbDefault.vue'

  import { ref, onMounted } from 'vue'
  import { useRouter } from 'vue-router'
  import axios from 'axios'
  
  const pageTitle = ref('Sign In')
  const router = useRouter()
  const user = {
        email: '',
        password: ''
    };

  const loginUser = () => {
        axios.post('/api/login', user)
            .then((response) => {
                localStorage.setItem('token', response.data.token);
                axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('token');
                router.push('/dashboard');
            })
            .catch((error) => {
                console.log('Error', error);
            });
    };

  onMounted(() => {
    axios.get('/api/user')
            .then((response) => {
                router.push('/dashboard');
                console.log(response)
            })
            .catch((error) => {
                router.push('/');
                console.log(error)
            })
  })
</script>
