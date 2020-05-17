<template>
  <v-card
    color="grey lighten-2"
    flat
    tile
  >
    <v-toolbar color="">
        <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->
        <v-toolbar-title>
          <router-link :to="{name: '', params: {} }" class="home-link">
            techForum
          </router-link>    
        </v-toolbar-title>   
        <v-spacer></v-spacer>
       
        <router-link :to="{ name: '', params: { }}">
          <v-btn text>Forum</v-btn>
        </router-link>
        <router-link :to="{ name: '', params: { }}">
         <v-btn text>Ask Question</v-btn>
        </router-link>
        <router-link :to="{ name: '', params: { }}">
          <v-btn text>Category</v-btn>
        </router-link>
        <router-link :to="{ name: 'login', params: { }}">
          <v-btn text>Login</v-btn>
        </router-link>

    </v-toolbar>
  
  </v-card>
</template>
<script>
export default {

}
</script>

<style scoped>
  a {
    text-decoration: none !important;
  }
  .home-link{
    color: #2B81D6;
    font-weight: bold;
  }
</style>