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
       
      <router-link 
        v-for="item in items"
        :key="item.title"  
        :to="item.to"
        v-if="item.show"
      >
        <v-btn text>{{ item.title }}</v-btn>
       </router-link>

    </v-toolbar>
  
  </v-card>
</template>
<script>
export default {
  data(){
    return {
      items: [
        {title: 'Forum', to: '/forum', show: true},
        {title: 'Ask Question', to: '/ask', show: User.loggedIn()},
        {title: 'Category', to: '/category', show: User.loggedIn()},
        {title: 'Login', to: '/login', show: !User.loggedIn()},
        {title: 'Logout', to: '/logout', show: User.loggedIn()},
      ]
    }
  },
  created(){
    EventBus.$on('logout', () => {
      User.logout()
    })
  }
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