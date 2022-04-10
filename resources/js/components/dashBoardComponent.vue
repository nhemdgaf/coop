<template>
    <v-app>
        <sideBar/>
        <appBar/>
        <v-main class="bg">
           <div>
               <h1>dawdawdw</h1>
           </div>
        </v-main>
    </v-app>
</template>


<script>
import appBar from '../components/appBar.vue'
import sideBar from '../components/sideBar.vue'

export default {
    name:"dashBoard",
    components:{sideBar,appBar}
}
</script>

<style>
.bg{
  background-color: #E0E0E0;
}
</style>