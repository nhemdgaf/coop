<template>
  <v-app>
     <sideBar/>
     <appBar/>
     <router-view/>
  </v-app>
   
</template>

<script>


import sideBar from './sideBarComponent'
import appBar from './appBarComponent'

export default {
  name: 'App',
  components:{sideBar,appBar,},
  data: () => ({
    //drawer: false
  }),
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

*{
  font-family: 'Poppins', sans-serif;
}
 
</style>
