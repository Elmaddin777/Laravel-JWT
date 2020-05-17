class User{
    login(form){

        axios
            .post('api/auth/login', form)
            .then(response => this.responseAfterLogin(response))
            .catch(error => {
                form.errored = true
                console.log(error);
            })
    }

    responseAfterLogin(response){
        const user = response.data.user
        const token = response.data.access_token

        if (Token.isValid(token)) {            
            Storage.store(user, token)
        }
    }

    hasToken(){
        const token = Storage.getToken()

        if(token){
            return true
        }

        return false
    }

    loggedIn(){
        return this.hasToken()
    }

    logout(){
        Storage.clear()
    }

    getName(){
        return Storage.getName()
    }

    getId(){
        if(this.loggedIn()){
            const token = Storage.getToken()
            const payload = Token.getPayload(token)
            return payload.sub
        }
    }

}

export default new User



