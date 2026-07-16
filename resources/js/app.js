import axios from 'axios';
window.axios = axios;



import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();



document.getElementById('logo-langue-app').addEventListener('click' , ()=>{
    const dropdownElm = document.getElementById('options-local-lang');
    if(dropdownElm.style.visibility=='visible'){
        dropdownElm.style.visibility='hidden'
    }else{
        dropdownElm.style.visibility='visible'
    }
})