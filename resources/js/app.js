const { forEach } = require('lodash');

require('./bootstrap');

require('alpinejs');

//show delete modal
let modals = document.getElementsByClassName('modal');
let modalOpeners = document.querySelectorAll('.modalOpener');
let buttonTogglers = document.querySelectorAll('.buttonToggler');
let crossTogglers = document.querySelectorAll('.crossToggler');

for(let i = 0; i < modals.length; i++){
    modalOpeners[i].addEventListener('click', function(){
        console.log('click')
        modals[i].classList.toggle('hidden');
    });
    buttonTogglers[i].addEventListener('click', function(){
        console.log('click')
        modals[i].classList.toggle('hidden');
    });
    crossTogglers[i].addEventListener('click', function(){
        console.log('click')
        modals[i].classList.toggle('hidden');
    });
}


