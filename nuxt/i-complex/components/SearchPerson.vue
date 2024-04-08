<template>
    <section>
        <h1 class="page-title">Найти пост по нику</h1>
        <div class="search-bar" >
            <form action="" @submit.prevent="findPost()">
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

export default {

    async created() {
    if(this.$route.query.userTag != null){
        let query = this.$route.query.userTag.replace(/[&\/\\#,+()$~%.'":*@<>{}]/g, '');
        if(!this.validate(query)){
                return
        };

        this.userTag = query;

        let data = await this.callApi(`api/post/getpostbyuser?tag=${query}`,'get')

       this.handleResponse(data);
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
        async findPost(){
            let query = this.userTag.replace(/[&\/\\#,+()$~%.'":*@<>{}]/g, '');


            if(!this.validate(query)){
                return
            };

            let data = await this.callApi(`api/post/getpostbyuser?tag=${query}`,'get')

            this.handleResponse(data);
        },
        validate(userTag){
            if(!validate.validateLength(userTag,4,30)){
                this.validateProp.message = "Тэг пользователя должен быть не меньше 4 символов и не более 30";
                this.validateProp.isValidSearch = true;
                return false
            }
            return true;
        },
        handleResponse(data){
            debugger
            switch(data.status){
                case 200:{
                    this.$emit('find-post',data.data)
                    this.validateProp.isValidSearch = false;
                    break;
                }
                case 404:{
                    this.validateProp.message = "Посты с упоминанием такого пользователя не найдены";
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

</style>
