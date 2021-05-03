require('./bootstrap');

require('alpinejs');

//show delete modal
let modal = document.querySelector('.modal');
let modalTogglers = document.querySelectorAll('.modalToggler');
modalTogglers.forEach(toggler => {
    toggler.addEventListener('click', () => {
        console.log("click")
        modal.classList.toggle('hidden');
    })
});
