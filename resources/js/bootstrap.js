import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//import Swal from "sweetalert2";
//window.Swal = Swal;
//window.bootstrap = bootstrap
import {baseUrl, ConstToast} from "./tweaks.js";

document.addEventListener("DOMContentLoaded", () => {

    //console.info("bootstrap js file successfully loaded !!")
    //ConstToast.fire({
    //         icon:'success',
    //         iconColor:'green',
    //         text: 'Yep'
    //     })
    console.info(baseUrl())

})
