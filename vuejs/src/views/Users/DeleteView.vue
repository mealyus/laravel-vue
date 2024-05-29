<script setup>
    import axios from 'axios'
    import { useRouter } from 'vue-router'

    const router = useRouter()
    const userId = router.currentRoute.value.params.id

    axios.delete('/api/user/' + userId)
            .then((response) => {
                router.push('/users')
                console.log(response.data.id)
            })
            .catch((error) => {
                console.log(error)
            })
</script>
<template>
    <div></div>
</template>