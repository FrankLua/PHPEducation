
export default {
  env: {
    apiUrl: process.env.API_URL
  },
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'i-complex',
    htmlAttrs: {
      lang: 'en'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
      { name: 'format-detection', content: 'telephone=no' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    'view-design/dist/styles/iview.css',
    '@/node_modules/bootstrap/dist/css/bootstrap.min.css'
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    '@/plugins/view-ui',

  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/typescript
    '@nuxt/typescript-build',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/auth',
    '@cssninja/nuxt-toaster',
    'nuxt-history-state'
  ],
  historyState: {
    maxHistoryLength: 50, // or any positive integer
    reloadable: false, // or true
    overrideDefaultScrollBehavior: true, // or false
    scrollingElements: '#scroll' // or any selector
  },
  auth: {
    strategies: {
      local: {
        token: {
          property: 'token',
          property: 'access_token',
          global: true,
          // required: true,
          type: 'Bearer'
        },
        user: {
          property: 'user',
          // autoFetch: true
        },
        url: '/api',
        endpoints: {
          login: { url: '/api/auth/login', method: 'post', propertyName: 'access_token' },
          logout: { url: '/api/auth/logout', method: 'post', propertyName: false },
          user: { url: '/api/auth/user', method: 'get', propertyName: false }
        }
      }
    }
  },

  axios: {
    baseUrl: "http://127.0.0.1:8000/api",
    credentials: true
  },


  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    extend(config, ctx) {
      if (ctx.isDev) {
        config.devtool = ctx.isClient ? 'source-map' : 'inline-source-map'
      }
    }
  },
  sourcemap: {
    server: true,
    client: true
  }
}
