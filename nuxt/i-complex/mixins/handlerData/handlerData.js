export default {
    handlerSearchPosts(data, $store) {
        debugger
        switch (data) {
            case 200: {
                return {
                    message: "",
                    isValidSearch: false
                }

            }
            case 404: {
                $store.dispatch('postsSearch/deleteAllSerchPosts');
                return {
                    message: "Посты не найдены",
                    isValidSearch: true
                }
            }
            case 500: {
                $store.dispatch('postsSearch/deleteAllSerchPosts');
                return {
                    message: "Что то пошло не так",
                    isValidSearch: true
                }
            }
        }
    }
}