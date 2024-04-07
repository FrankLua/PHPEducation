import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _8780b8c2 = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages/about" */))
const _0e930ffd = () => interopDefault(import('..\\pages\\posts\\index.vue' /* webpackChunkName: "pages/posts/index" */))
const _b29a0ab0 = () => interopDefault(import('..\\pages\\users\\index.vue' /* webpackChunkName: "pages/users/index" */))
const _b6b7a85a = () => interopDefault(import('..\\pages\\auth\\login.vue' /* webpackChunkName: "pages/auth/login" */))
const _54f05f82 = () => interopDefault(import('..\\pages\\auth\\registration.vue' /* webpackChunkName: "pages/auth/registration" */))
const _25c152fb = () => interopDefault(import('..\\pages\\posts\\postSearchHash.vue' /* webpackChunkName: "pages/posts/postSearchHash" */))
const _0b191efc = () => interopDefault(import('..\\pages\\posts\\postSearchPerson.vue' /* webpackChunkName: "pages/posts/postSearchPerson" */))
const _48110338 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages/index" */))
const _62a224b6 = () => interopDefault(import('..\\pages\\posts\\_id.vue' /* webpackChunkName: "pages/posts/_id" */))
const _5c8f8710 = () => interopDefault(import('..\\pages\\users\\_id.vue' /* webpackChunkName: "pages/users/_id" */))

const emptyFn = () => {}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: '/',
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/about",
    component: _8780b8c2,
    name: "about"
  }, {
    path: "/posts",
    component: _0e930ffd,
    name: "posts"
  }, {
    path: "/users",
    component: _b29a0ab0,
    name: "users"
  }, {
    path: "/auth/login",
    component: _b6b7a85a,
    name: "auth-login"
  }, {
    path: "/auth/registration",
    component: _54f05f82,
    name: "auth-registration"
  }, {
    path: "/posts/postSearchHash",
    component: _25c152fb,
    name: "posts-postSearchHash"
  }, {
    path: "/posts/postSearchPerson",
    component: _0b191efc,
    name: "posts-postSearchPerson"
  }, {
    path: "/",
    component: _48110338,
    name: "index"
  }, {
    path: "/posts/:id",
    component: _62a224b6,
    name: "posts-id"
  }, {
    path: "/users/:id",
    component: _5c8f8710,
    name: "users-id"
  }],

  fallback: false
}

export function createRouter (ssrContext, config) {
  const base = (config._app && config._app.basePath) || routerOptions.base
  const router = new Router({ ...routerOptions, base  })

  // TODO: remove in Nuxt 3
  const originalPush = router.push
  router.push = function push (location, onComplete = emptyFn, onAbort) {
    return originalPush.call(this, location, onComplete, onAbort)
  }

  const resolve = router.resolve.bind(router)
  router.resolve = (to, current, append) => {
    if (typeof to === 'string') {
      to = normalizeURL(to)
    }
    return resolve(to, current, append)
  }

  return router
}
