<script setup>

import {ref} from 'vue'

import axios from 'axios'

import {router} from '@inertiajs/vue3'


const email = ref('')
const password = ref('')



const login = async()=>{


try{


let response = await axios.post(
'/api/login',
{

email:email.value,

password:password.value

}

)



localStorage.setItem(
'token',
response.data.token
)



axios.defaults.headers.common['Authorization'] =
`Bearer ${response.data.token}`



router.visit('/dashboard')



}catch(error){


alert('Login gagal')


}



}



</script>



<template>


<div class="login">


<h1>
Smart Asset Hub
</h1>


<input 
v-model="email"
placeholder="Email"
/>



<input
v-model="password"
type="password"
placeholder="Password"
/>



<button @click="login">

Login

</button>


</div>


</template>




<style scoped>


.login{

max-width:400px;

margin:80px auto;

padding:30px;

display:flex;

flex-direction:column;

gap:15px;

}



input{

padding:12px;

border-radius:8px;

border:1px solid #ccc;

}



button{

padding:12px;

background:#2563eb;

color:white;

border:none;

border-radius:8px;

}


</style>