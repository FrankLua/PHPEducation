<template>
    <section>
        <h1 class="page-title">Найти пост по нику</h1>
        <div class="search-bar" >
            <form action="" @submit.prevent="findPost(userTag)">
                <div class="alert alert-danger" role="alert" v-show="validateProp.isValidSearch">
                    {{this.validateProp.message}}
                </div>
            <input type="text" class="form-control" v-model="userTag" placeholder="Ivan">
            <div class="alert alert-primary" role="alert">
                    Напишите тэг пользователя который желаете найти
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
    if(this.$route.query.userTag != null){
        this.findPost(this.$route.query.userTag);
    }
  },
    data(){
        return{
            userTag:'',
            validateProp:{
                isValidSearch : false,
                message:''
            }
        };
    },
    methods:{
        async findPost(query){
            let prepaedQuery = query.replace(/[&\/\\@,+()$~%.'":*<>{}]/g, '');


            if(!this.validate(prepaedQuery)){
                return
            };

            let data = await this.$store.dispatch('postsSearch/fetchSearchByTag',prepaedQuery);

            this.validateProp = handlerData.handlerSearchPosts(data,this.$store);
        },
        validate(userTag){
            if(!validate.validateLength(userTag,4,30)){
                this.validateProp.message = "Тэг пользователя должен быть не меньше 4 символов и не более 30";
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

</style>
