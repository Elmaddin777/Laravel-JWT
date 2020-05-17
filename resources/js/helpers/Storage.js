class Storage{
    storeToken(token){
        localStorage.setItem('token', token)
    }

    storeUser(user){
        localStorage.setItem('user', user)
    }

    store(user, token){
        this.storeUser(user)
        this.storeToken(token)
    }

    getToken(){
        return localStorage.getItem('token')
    }

    getUser(){
        return localStorage.getItem('user')
    }

    clear(){
        localStorage.clear()
    }
}

export default new Storage