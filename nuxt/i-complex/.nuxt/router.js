import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _bd1dc894 = () => interopDefault(import('../pages/about.vue' /* webpackChunkName: "pages/about" */))
const _4c008b02 = () => interopDefault(import('../pages/posts/index.vue' /* webpackChunkName: "pages/posts/index" */))
const _08324e74 = () => interopDefault(import('../pages/users/index.vue' /* webpackChunkName: "pages/users/index" */))
const _d9a2f72e = () => interopDefault(import('../pages/auth/login.vue' /* webpackChunkName: "pages/auth/login" */))
const _c5ca7a2e = () => interopDefault(import('../pages/auth/registration.vue' /* webpackChunkName: "pages/auth/registration" */))
const _463f5ab9 = () => interopDefault(import('../pages/posts/postSearchHash.vue' /* webpackChunkName: "pages/posts/postSearchHash" */))
const _18e2fe80 = () => interopDefault(import('../pages/posts/postSearchPerson.vue' /* webpackChunkName: "pages/posts/postSearchPerson" */))
const _7dae130a = () => interopDefault(import('../pages/index.vue' /* webpackChunkName: "pages/index" */))
const _7a2f5eb2 = () => interopDefault(import('../pages/posts/_id.vue' /* webpackChunkName: "pages/posts/_id" */))
const _7d295ddc = () => interopDefault(import('../pages/users/_id.vue' /* webpackChunkName: "pages/users/_id" */))

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
    component: _bd1dc894,
    name: "about"
  }, {
    path: "/posts",
    component: _4c008b02,
    name: "posts"
  }, {
    path: "/users",
    component: _08324e74,
    name: "users"
  }, {
    path: "/auth/login",
    component: _d9a2f72e,
    name: "auth-login"
  }, {
    path: "/auth/registration",
    component: _c5ca7a2e,
    name: "auth-registration"
  }, {
    path: "/posts/postSearchHash",
    component: _463f5ab9,
    name: "posts-postSearchHash"
  }, {
    path: "/posts/postSearchPerson",
    component: _18e2fe80,
    name: "posts-postSearchPerson"
  }, {
    path: "/",
    component: _7dae130a,
    name: "index"
  }, {
    path: "/posts/:id",
    component: _7a2f5eb2,
    name: "posts-id"
  }, {
    path: "/users/:id",
    component: _7d295ddc,
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
