/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end.
 */


import axios from 'axios';


window.axios = axios;



/**
 * Default Axios Configuration
 */

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.defaults.headers.common['Accept'] = 'application/json';





/**
 * Laravel Sanctum API Token Authentication
 *
 * Mengambil token login dari localStorage
 * lalu dikirim setiap request API
 */


const token = localStorage.getItem('token');



if (token) {


    window.axios.defaults.headers.common['Authorization'] =
        `Bearer ${token}`;


}






/**
 * Axios Response Handler
 * Jika token expired / unauthorized
 * otomatis kembali ke halaman login
 */


window.axios.interceptors.response.use(


    response => response,


    error => {


        if(error.response?.status === 401){


            localStorage.removeItem('token');


            delete window.axios.defaults.headers.common['Authorization'];


            window.location.href = '/login';


        }


        return Promise.reject(error);


    }


);





/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel.
 */


// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';

// window.Pusher = Pusher;


// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST
//         ? import.meta.env.VITE_PUSHER_HOST
//         : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });