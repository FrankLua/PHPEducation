<template>
  <section>
    <div class="main-welcome">
      <h1>Добро пожаловать на наш сайт</h1>
      <h3 v-if="!$auth.loggedIn">Зарегистрируйтесь и сможете пользоваться услугами нашего сайта</h3>
    </div>
  </section>


</template>

<script >
export default {
  
  methods:{
    
    click(){
    }
    
  }


}

</script>



<style>
.main-welcome{
  text-align: center;
}

</style>
