class Token{
    isValid(token){
        const payload = this.getPayload(token)

        if (payload) {
           return payload.iss == 'https://lararealtime/api/auth/login' ? true : false
        }

        return false
    }


    getPayload(token){
        const payload = this.parseToken(token.split('.')[1])
        return payload
    }


    parseToken(token){
        // Using atob() to decode
        return JSON.parse(atob(token))
    }
}

export default new Token