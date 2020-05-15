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
            <v-btn 
                class="login-button mb-5" 
                type="submit"
                color="primary"
                @click.prevent = "signin()"
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
  methods: {
      signin(){
        console.log(this.form.email);
        console.log(this.form.password);
        
        
         axios
            .post('api/auth/login', this.form)
            .then(response => console.log(response))
            .catch(error => {
                this.form.errored = true
                console.log(error);
            })
          
          
      }
  }
}
</script>

<style>
.login-form{
    margin: 0 auto !important;
}
.login-button{
    float: right;
}
</style>