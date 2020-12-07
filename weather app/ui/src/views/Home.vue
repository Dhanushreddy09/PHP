<template>
  <div>
    <table >
      <tr>
        <th id="city" @click="sort">CITY</th>
        <th>TEMPERATURE</th>
        <th>WIND SPEED</th>
        <th>VISIBILITY</th>
        <th>RATING</th>
      </tr>
      <tr v-for="element in cities" :key='element.id'>
        <td>{{element.name}}</td>
        <td>{{element.main.temp}}</td>
        <td>{{element.wind.speed}}</td>
        <td>{{element.visibility}}</td>
        <td><b-form-rating :key="element.id" @change="alteraverage(element.id)" v-model="stars" variant="warning" class="mb-2"></b-form-rating>     AVEREGE:{{average}}</td>
      </tr>
    </table>
  </div>
</template>

<script>
import {mapActions, mapState} from 'vuex'
export default {
  name: 'Home',
  data:function(){
    return{
      stars:0,
    }
  },
  computed:{
    ...mapState(['cities','average'])
  },
  methods:{
     ...mapActions['changeaverage'],
    alteraverage:function(id){
      const params={
        id:id,
        stars:this.stars
      }
      this.$store.dispatch("changeaverage",params)
    },
    sort(){
     this.cities.sort((a,b) => (a.name > b.name) ? 1 : ((b.name > a.name) ? -1 : 0));
    }
  }
}

</script>
<style scoped>
table{
  border-spacing: 100px;
  width:100%
}
tr{
  height:60px
}
th{
  background: lightskyblue;
}
#city::before{
  content:"\2193";
}
#city{
  cursor: pointer;
}
</style>
