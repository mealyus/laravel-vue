<script setup>
    import DefaultLayout from '@/layouts/DefaultLayout.vue'
    import axios from 'axios'
    import { ref } from 'vue'
    import { useRouter } from 'vue-router'

    const router = useRouter()
    const userId = router.currentRoute.value.params.id
    const user = ref({
        first_name: '',
        last_name: '',
        email: '',
        password: ''
    });

    axios.get('/api/user/' + userId)
            .then((response) => {
                user.value = response.data.user
            })
            .catch((error) => {
                console.log(error)
            })
    

    const handleSubmit = () => {
        axios.patch('/api/user/' + userId, user.value)
            .then((response) => {
                router.push('/users')
                console.log('Success', response);
            })
            .catch((error) => {
                console.log('Error', error);
            })
    }
</script>
<template>
    <DefaultLayout>
        <div class="block w-full p-6 bg-white rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
            <form @submit.prevent="handleSubmit">
                <div class="my-4">
                  <input type="text" v-model="user.first_name" placeholder="First Name" class="w-full rounded border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                </div>
                <div div class="my-4">
                  <input type="text" v-model="user.last_name" placeholder="Last Name" class="w-full rounded border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                </div>
                <div div class="my-4">
                  <input type="email" v-model="user.email" placeholder="E-Mail" class="w-full rounded border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                </div>
                <div div class="my-4">
                  <input type="password" v-model="user.password" placeholder="Password" class="w-full rounded border-[1.5px] text-black border-stroke bg-transparent py-3 px-5 font-normal outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:text-white dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                </div>
                
                <button
                    type="submit"
                    class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90"
                >
                  Update User
                </button>
            </form>
        </div>
    </DefaultLayout>
</template>