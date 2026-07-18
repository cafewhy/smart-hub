<script setup>

import {ref,onMounted} from 'vue'

import axios from 'axios'


const bookings = ref([])



const loadData = async()=>{


let res = await axios.get('/api/checkin')

bookings.value=res.data


}



const checkin = async(id)=>{


await axios.post(
'/api/checkin/'+id
)


alert(
'Equipment berhasil dikembalikan'
)


loadData()


}



onMounted(()=>{

loadData()

})


</script>



<template>

<div class="container">


<h1>
Check In Equipment
</h1>


<a href="/dashboard">
⬅ Dashboard
</a>



<table>


<tr>

<th>Equipment</th>

<th>Peminjam</th>

<th>Aksi</th>

</tr>



<tr v-for="item in bookings">


<td>
{{item.equipment.name}}
</td>


<td>
{{item.user.name}}
</td>



<td>

<button @click="checkin(item.id)">
Check In
</button>


</td>


</tr>


</table>



</div>


</template>




<style scoped>


.container{

padding:40px;

}


table{

margin-top:30px;

width:100%;

}


td,th{

border:1px solid #ddd;

padding:10px;

}


button{

background:green;

color:white;

padding:10px;

border:none;

}


</style>