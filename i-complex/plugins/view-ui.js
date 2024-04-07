import Vue from 'vue'
import ViewUI from 'view-design'
import locale from 'view-design/dist/locale/en-US' // Change locale, check node_modules/view-design/dist/locale

Vue.use(ViewUI, {
  locale
})

Vue.mixin(
  {
    methods: {
      async callApi(url, method, dataObj) {
        try {
          let data = await this.$axios({
            method: method,
            url: url,
            data: dataObj
          });
          return data;
        }
        catch (e) {
          return e.response
        }

      }
    }
  }
)