import vue from 'vue'
import vuex from 'vuex'
import axios from 'axios'

vue.use(vuex)


const store={
    state:{
       cities:[],
       average:'1'
    },
    mutations:{
        setcities(state,cities){
               state.cities=cities.list
        },
        setaverage(state,avg){
                   state.average=avg
        }
    },
    actions:{
        getcities({commit}){
            axios.get("https://cors-anywhere.herokuapp.com/https://samples.openweathermap.org/data/2.5/group?id=6141256,6119109,6113335,6078112,6160603,6185607&units=metric&appid=05393dfda137d70aa1c5d90b9175fc4e").then(
             res=>{
                let cities=res.data
                commit("setcities",cities)
             }
            )
        },
        changeaverage({commit},params){
            //console.log(params.id)
            axios.post("http://localhost/api/wwwroot/index.php",{action:'average',params}).then(
                res=>{
                    commit("setaverage",res.data)
                }
            )
        }
    }
}
export default new vuex.Store(store);