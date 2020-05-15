<template>
      <v-app>
         <toolbar></toolbar>
         <app-footer></app-footer>
      </v-app>
</template>

<script>
import Toolbar from './Toolbar'
import AppFooter from './AppFooter'

export default {
      components: {
            Toolbar, 
            AppFooter
      }
}
</script>

<style>

</style>