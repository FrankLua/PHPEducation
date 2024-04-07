import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _e8831712 = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages/about" */))
const _0fc81c25 = () => interopDefault(import('..\\pages\\posts\\index.vue' /* webpackChunkName: "pages/posts/index" */))
const _b02ff260 = () => interopDefault(import('..\\pages\\users\\index.vue' /* webpackChunkName: "pages/users/index" */))
const _1008faab = () => interopDefault(import('..\\pages\\auth\\login.vue' /* webpackChunkName: "pages/auth/login" */))
const _69bd1e67 = () => interopDefault(import('..\\pages\\auth\\registration.vue' /* webpackChunkName: "pages/auth/registration" */))
const _4cf373d3 = () => interopDefault(import('..\\pages\\posts\\postSearchHash.vue' /* webpackChunkName: "pages/posts/postSearchHash" */))
const _1da0bb5a = () => interopDefault(import('..\\pages\\posts\\postSearchPerson.vue' /* webpackChunkName: "pages/posts/postSearchPerson" */))
const _a9136188 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages/index" */))
const _5e88e3cd = () => interopDefault(import('..\\pages\\posts\\_id.vue' /* webpackChunkName: "pages/posts/_id" */))
const _272d0590 = () => interopDefault(import('..\\pages\\users\\_id.vue' /* webpackChunkName: "pages/users/_id" */))

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
    component: _e8831712,
    name: "about"
  }, {
    path: "/posts",
    component: _0fc81c25,
    name: "posts"
  }, {
    path: "/users",
    component: _b02ff260,
    name: "users"
  }, {
    path: "/auth/login",
    component: _1008faab,
    name: "auth-login"
  }, {
    path: "/auth/registration",
    component: _69bd1e67,
    name: "auth-registration"
  }, {
    path: "/posts/postSearchHash",
    component: _4cf373d3,
    name: "posts-postSearchHash"
  }, {
    path: "/posts/postSearchPerson",
    component: _1da0bb5a,
    name: "posts-postSearchPerson"
  }, {
    path: "/",
    component: _a9136188,
    name: "index"
  }, {
    path: "/posts/:id",
    component: _5e88e3cd,
    name: "posts-id"
  }, {
    path: "/users/:id",
    component: _272d0590,
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
