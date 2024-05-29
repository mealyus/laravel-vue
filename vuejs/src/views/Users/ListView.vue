<script setup lang="ts">
    import DefaultLayout from '@/layouts/DefaultLayout.vue'
    import { ref } from 'vue'
    import axios from 'axios'

    import DataTable from 'datatables.net-vue3';
    import DataTablesCore from 'datatables.net-bs5';
    // import 'https://cdn.datatables.net/2.0.8/js/dataTables.js'
    
    DataTable.use(DataTablesCore);
    const data = ref([])
    const columns = ref([
        { data: 'first_name' },
        { data: 'last_name' },
        { data: 'email' },
        { data: 'action' },
    ])

    axios.get('/api/users')
            .then((response) => {
                data.value = response.data.data
            })
            .catch((error) => {
                console.log(error)
            })
    
    const deleteUser = (id) => {
        console.log(id)
    }
</script>

<template>
  <DefaultLayout>

    <div class="block w-full p-6 bg-white rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">
        <DataTable :data="data" :columns="columns" class="display">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </DataTable>
    </div>

    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.tailwindcss.css" rel="stylesheet">
    
  </DefaultLayout>
</template>

<style>
    /* @import 'bootstrap'; */
@import 'datatables.net-bs5';
</style>
