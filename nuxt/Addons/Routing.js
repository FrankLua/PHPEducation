/* 
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './App.vue'
import HomeView from './views/HomeView.vue'
const router = createRouter({
  routes: [{
    path: '/',
    component: HomeView
  }],
  history: createWebHistory()
})

const app = createApp(App)
app.use(router)
app.mount('#app')

Маршруты — это массив объектов, в котором мы описываем правила для отображения компонентов в зависимости от маршрута.

history — это настройка, которая отвечает за механизм поведения Vue Router.
Мы указали createWebHistory(), то есть роутер будет использовать History API.

app.vue

<template>
  <router-view />
</template>

*/