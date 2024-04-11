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
import handlerData from '~/mixins/handlerData/handlerData';
export default {
    async created() {
    if(this.$route.query.hash != null){
      this.findPost(this.$route.query.hash);
    }
  },
    data(){
        return{
            hash:this.$route.query.hash ?? '',
            validateProp:{
                isValidSearch : false,
                message:''
            }
        };
    },
    methods:{
        async findPost(query){
            let prepaedQuery = query.replace(/[&\/\\#,+()$~%.'":*<>{}]/g, '');

            if(!this.validate(prepaedQuery)){
                return
            };

            let data = await this.$store.dispatch('postsSearch/fetchSearchByHash',prepaedQuery);

            this.validateProp = handlerData.handlerSearchPosts(data,this.$store);
        },
        validate(hash){
            if(!validate.validateLength(hash,0,50)){
                this.validateProp.message = "Максимальная длина хэштега 50 символов";
                this.validateProp.isValidSearch = true;
                return false
            }
            return true;
        }
    }
}
</script>


<style>
.search-bar{
    text-align: center;
    padding-bottom: 5px ;
    border-bottom: 3px black solid;
    >form>button{
        margin-top: 10px;;
    }
}
.alert{
    margin-top: 10px;
}

</style>
