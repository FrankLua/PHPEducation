<template>
    <section>
        <h1 class="page-title">Найти пост по хэштегу</h1>
        <div class="search-bar" >
            <form action="" @submit.prevent="findPost(hash)">
                <div class="alert alert-danger" role="alert" v-show="validateProp.isValidSearch">
                    {{this.validateProp.message}}
                </div>
            <input type="text" class="form-control" v-model="hash" placeholder="Музыка">
                <div class="alert alert-primary" role="alert">
                    Напишите хэштег который желаете найти
                </div>
            <button class="btn btn-info"> Найти </button>
            </form>
        </div>
    </section>
</template>
<script>
import validate from '~/mixins/validate/validate';
export default {
    async created() {

    if(this.$route.query.hash != null){
      this.findPost(this.$route.query.hash)


    }
  },
    data(){
        return{
            hash:'',
            validateProp:{
                isValidSearch : false,
                message:''
            }
        };
    },
    methods:{
        async findPost(query){


            let prepaedQuery = query.replace(/[&\/\\#,+()$~%.'":*<>{}]/g, '')
            console.log(prepaedQuery)

            if(!this.validate(prepaedQuery)){
                return
            };

            let data = await this.callApi(`api/post/getpostbyhash?hash_tag=${prepaedQuery}`,'get');

            this.handleResponse(data);
        },
        validate(hash){
            if(!validate.validateLength(hash,0,50)){
                this.validateProp.message = "Максимальная длина хэштега 50 символов";
                this.validateProp.isValidSearch = true;
                return false
            }
            return true;
        },
        handleResponse(data){
          debugger
          console.log(data);
             switch(data.status){
                case 200:{
                    this.$emit('find-post',data.data)
                    this.validateProp.isValidSearch = false;
                    break;
                }
                case 404:{
                    this.validateProp.message = "Посты с упоминанием такого хэштега не найдены";
                    this.$emit('find-post',[])
                    this.validateProp.isValidSearch = true;
                    break;
                }
                case 500:{
                    this.validateProp.message = "Что то пошло не так";
                    this.$emit('find-post',[])
                    this.validateProp.isValidSearch = true;
                    break;
                }
            }
        }
    }
}
</script>


<style>
.search-bar{
    text-align: center;
    >form>button{
        margin-top: 10px;;
    }
}
.alert{
    margin-top: 10px;
}

</style>
