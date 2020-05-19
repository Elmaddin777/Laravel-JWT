<template>
 
      <div class="col-md-5 login-form">
        <form>
            <v-text-field
                v-model="form.email"
                label="Email"
                required
                type = "email"
            ></v-text-field>
            <v-text-field
                v-model="form.password"
                label="Password"
                required
                type = "password"
            ></v-text-field>
          
            <v-checkbox class="form-checkbox"
                label="Do you agree?"
            ></v-checkbox>
            
            <router-link :to="{ name: 'register', params: { }}"  class="login-button mb-5">
                 <v-btn outlined color="primary">sign up</v-btn>
            </router-link>
           
            <v-btn 
                @click.prevent = "signin()"
                class="register-button mb-5" 
                type="submit"
                color="primary"
            >sign in</v-btn>
            
        </form>
      </div>
   
</template>



<script>
export default {
  name: 'login',
  data(){
      return {
          form: {
              email: null,
              password: null
          },
          errored: false
      }
  },
  created(){
      if (User.loggedIn()) {
          this.$router.push({name: 'forum'})
      }
  },
  methods: {
      signin(){
        User.login(this.form)
        this.$router.push({name: 'forum'})
      }
  }
}
</script>


<style>
.login-form{
    margin: 0 auto !important;
}
.login-button{
    float:left ;
}
.register-button{
    float: right;
}
</style>