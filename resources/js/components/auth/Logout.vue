<template>
  <h1>logout</h1>
</template>

<script>
name: 'logout'
export default {
    created(){
        EventBus.$emit('logout')
    }  
}
</script>

<style>

</style>