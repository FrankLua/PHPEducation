export default {
    postStoreCallBack(data) {
        if (data.status == 201) {
            this.$router.push('/posts');
            alert("Вы удачно создали пост")
            this.closeModal()
        }
        else {
            //Error page
            alert("Что то пошло не так")
            this.closeModal()
        }
    }
}