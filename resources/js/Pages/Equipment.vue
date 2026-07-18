<script setup>

import {ref,onMounted} from 'vue'
import axios from 'axios'


const equipments = ref([])


const name = ref('')
const description = ref('')



const loadData = async()=>{

    let response = await axios.get('/api/equipments')

    equipments.value = response.data

}



const addEquipment = async()=>{


    await axios.post('/api/equipments',
    {

        name:name.value,

        description:description.value,

        status:'tersedia'

    })


    name.value=''
    description.value=''


    loadData()


}



const deleteEquipment = async(id)=>{


    if(confirm('Hapus equipment?')){


        await axios.delete(
            '/api/equipments/'+id
        )


        loadData()

    }


}



onMounted(()=>{

    loadData()

})


</script>



<template>

<div class="container">


<h1>
Manage Equipment
</h1>



<a href="/dashboard">
⬅ Dashboard
</a>



<h2>
Tambah Equipment
</h2>



<input
v-model="name"
placeholder="Nama Equipment"
/>



<textarea
v-model="description"
placeholder="Deskripsi"
></textarea>



<button @click="addEquipment">

Tambah

</button>




<h2>
Daftar Equipment
</h2>



<table>


<tr>

<th>
Nama
</th>


<th>
Deskripsi
</th>


<th>
Status
</th>


<th>
Aksi
</th>


</tr>



<tr v-for="item in equipments"
:key="item.id">


<td>
{{item.name}}
</td>


<td>
{{item.description}}
</td>


<td>
{{item.status}}
</td>


<td>

<button 
@click="deleteEquipment(item.id)"
>
Delete
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


input,textarea{

display:block;

width:300px;

padding:10px;

margin:10px 0;

}



textarea{

height:80px;

}



button{

padding:10px 20px;

background:#2563eb;

color:white;

border:none;

border-radius:8px;

cursor:pointer;

}



table{

margin-top:30px;

width:100%;

border-collapse:collapse;

}



td,th{

border:1px solid #ddd;

padding:10px;

}



a{

text-decoration:none;

}



</style>