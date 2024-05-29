import { createRouter, createWebHistory } from 'vue-router'

import SigninView from '@/views/Authentication/SigninView.vue'
import Dashboard from '@/views/Dashboard/DashboardView.vue'
import Users from '@/views/Users/ListView.vue'
import UserCreate from '@/views/Users/CreateView.vue'
import UserEdit from '@/views/Users/EditView.vue'
import UserDelete from '@/views/Users/DeleteView.vue'

const routes = [
  {
    path: '/',
    name: 'login',
    component: SigninView,
    meta: {
      title: 'Signin'
    }
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      title: 'Dashboard'
    }
  },
  {
    path: '/users',
    name: 'users',
    component: Users,
    meta: {
      title: 'List User'
    }
  },
  {
    path: '/user/create',
    name: 'user-create',
    component: UserCreate,
    meta: {
      title: 'Create User'
    }
  },
  {
    path: '/user/:id/edit',
    name: 'user-edit',
    component: UserEdit,
    meta: {
      title: 'Edit User'
    }
  },
  {
    path: '/user/:id/delete',
    name: 'user-delete',
    component: UserDelete,
    meta: {
      title: 'Delete User'
    }
  },
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return savedPosition || { left: 0, top: 0 }
  }
})

router.beforeEach((to, from, next) => {
  document.title = `Vue.js ${to.meta.title} | TailAdmin - Vue.js Tailwind CSS Dashboard Template`
  next()
})

export default router
