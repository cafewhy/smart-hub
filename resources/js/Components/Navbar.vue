<script setup>

import {router} from '@inertiajs/vue3'


const logout = ()=>{


localStorage.removeItem('token')


delete axios.defaults.headers.common['Authorization']


router.visit('/login')


}


</script>


<template>


<nav>


<div class="logo">

Smart Asset Hub

</div>



<div class="menu">


<a href="/dashboard">
Dashboard
</a>


<a href="/equipment">
Equipment
</a>


<a href="/booking">
Transaction
</a>



<button @click="logout">

Logout

</button>



</div>



</nav>


</template>



<style scoped>


nav{

display:flex;

justify-content:space-between;

align-items:center;

padding:15px 30px;

background:#2563eb;

color:white;

}



.logo{

font-size:20px;

font-weight:bold;

}



.menu{

display:flex;

gap:15px;

align-items:center;

}



a{

color:white;

text-decoration:none;

}



button{

background:white;

color:#2563eb;

border:none;

padding:8px 15px;

border-radius:8px;

cursor:pointer;

}



@media(max-width:600px){


nav{

flex-direction:column;

gap:15px;

}



.menu{

flex-wrap:wrap;

justify-content:center;

}


}


</style>