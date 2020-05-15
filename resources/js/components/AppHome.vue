<template>
      <v-app>
         <toolbar></toolbar>
        
         <v-container>
            <router-view :to="{ name: 'login', params: { }}">Login</router-view>
         </v-container>
        
         <app-footer></app-footer>
      </v-app>
</template>

<script>
import Toolbar from './Toolbar'
import AppFooter from './AppFooter'
import Login from './auth/Login'

export default {
      components: {
            Toolbar, 
            AppFooter,
            Login
      }
}
</script>

<style>

</style>