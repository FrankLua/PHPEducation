<template>
    <section>
         <div class="auth-form">
        <div v-show = "validateProp.isError" class="alert alert-danger">
                {{validateProp.message}}
            </div>
        <form @submit.prevent="onSubmit">
            <h1>Регистрация</h1>            
            <div v-show="validateProp.isValidEmail" class="alert alert-danger">
                {{ validateProp.messageEmail }}
            </div>
            <div class="form-group">
                <input v-model="userRegistr.email" type="text" class="form-control" placeholder="Ваш емайл" name="login">
            </div>
            <div class="form-group">
                <input v-model="userRegistr.password" type="password" class="form-control" placeholder="Ваш пароль" name="password">
            </div>
            <div v-show="validateProp.isValidPassword" class="alert alert-danger">
                {{ validateProp.messagePassword }}
            </div>
            <div class="form-group">
                <input v-model="userRegistr.name" type="text" class="form-control" placeholder="Ваше имя" name="name">
            </div>
            <div v-show="validateProp.isValidName" class="alert alert-danger">
                {{ validateProp.messageName }}
            </div>
            <button class="btn " style="background-color: #8064A2; width: 90%;" type="submit"> Регистрация </button>
        </form>
        </div>
    </section>

</template>

<script>
import validate from '~/mixins/validate/validate';


export default {
    layout: 'empty',
    data() {
        return {
            userRegistr:{
                email: '',
                password: '',
                name:''
            },
            validateProp:{
                isValidEmail:false,
                messageEmail:'',
                isValidPassword:false,
                messagePassword:'',
                isValidName:false,
                messageName:'',
                isError:false,
                message:''
            }
        }
    },
    methods: {
        async onSubmit() {
            if(!this.validate(this.userRegistr)){
                return;
            }
            let data = await this.callApi("api/auth/register",'post',this.userRegistr)

            this.handlerResponse(data);
        },
        async handlerResponse(data){
            
            switch(data.status){
                case 201: await this.$auth.loginWith('local',{
                        data: {
                            email: this.userRegistr.email,
                            password: this.userRegistr.password
                        }
                    })
                break;
                case 409:
                    this.validateProp.isError = true;
                    this.validateProp.message = 'Пользователь с таким емайлом уже зарегистрирован'
                    break;
                case 500:
                    this.validateProp.isError = true;
                    this.validateProp.message = 'Неправильный пароль или емайл'
                    break;
                break;
            }            
            }
        ,
        validate(user){
            if(!validate.validateLength(user.email,8,50)){
                this.validateProp.messageEmail = "Максимальная длина емайла 50 символов минимальная 8";
                this.validateProp.isValidEmail = true;
                return false
            }
            if(!validate.validateEmail(user.email)){
                this.validateProp.messageEmail = "Введите правильно свой емайл";
                this.validateProp.isValidEmail = true;
                return false
            }
            if(!validate.validateLength(user.password,8,50)){
                this.validateProp.messagePassword = "Пароль не может быть меньше 8 символов";
                this.validateProp.isValidPassword = true;
                return false
            }            
            if(!validate.validateLength(user.name,3,50)){
                this.validateProp.messageName = "Имя должно быть минимум из 3 символов";
                this.validateProp.isValidName = true;
                return false
            }
            return true;
        }
    }
}

</script>

<style scoped>
.auth-form{
    background: #1C1E20;
    width: 800px;
    text-align: center;
    color: white;
    border-radius: 25px;
    padding: 10%;
}
form {
    width: 500px;
    margin: 0 auto;

}

.form-group {
    margin: 2%;
}
</style>