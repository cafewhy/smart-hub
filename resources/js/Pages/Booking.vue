<script setup>

import {ref,onMounted} from 'vue'
import axios from 'axios'


const bookings = ref([])
const equipments = ref([])


const equipment_id = ref('')
const borrow_date = ref('')
const return_date = ref('')



const loadData = async()=>{


    let bookingResponse = await axios.get(
        '/api/bookings'
    )


    bookings.value = bookingResponse.data



    let equipmentResponse = await axios.get(
        '/api/equipments'
    )


    equipments.value = equipmentResponse.data


}




const createBooking = async()=>{


    try{


        await axios.post(
            '/api/bookings',
            {

                user_id:2,

                equipment_id:
                equipment_id.value,

                borrow_date:
                borrow_date.value,

                return_date:
                return_date.value

            }
        )


        alert('Booking berhasil')


        loadData()



    }catch(error){


        console.log(error.response)


        alert('Booking gagal')


    }


}




const updateBooking = async(id)=>{


    await axios.put(

        '/api/bookings/'+id,

        {

            status:'dikembalikan'

        }

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
Manage Booking
</h1>



<a href="/dashboard">
⬅ Dashboard
</a>




<h2>
Form Peminjaman
</h2>



<select v-model="equipment_id">


<option value="">
Pilih Equipment
</option>


<option
v-for="item in equipments"
:key="item.id"
:value="item.id"
>

{{item.name}}

</option>


</select>




<input
type="date"
v-model="borrow_date"
/>



<input
type="date"
v-model="return_date"
/>




<button @click="createBooking">

Pinjam

</button>




<h2>
Data Booking
</h2>



<table>


<tr>

<th>
Equipment
</th>


<th>
Tanggal Pinjam
</th>


<th>
Tanggal Kembali
</th>


<th>
Status
</th>


<th>
Action
</th>


</tr>



<tr
v-for="item in bookings"
:key="item.id"
>


<td>

{{item.equipment?.name}}

</td>


<td>

{{item.borrow_date}}

</td>


<td>

{{item.return_date}}

</td>


<td>

{{item.status}}

</td>


<td>


<button
@click="updateBooking(item.id)"
>

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


input,select{

display:block;

margin:10px 0;

padding:10px;

width:300px;

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



</style>