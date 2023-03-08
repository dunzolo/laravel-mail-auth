import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const buttons_delete = document.querySelectorAll('.delete-button[type="submit"]');

buttons_delete.forEach((button) => {
    button.addEventListener('click', function (event) {
        // evitiamo che venga cancellato subito il record dal database
        event.preventDefault();

        // recupero la modale tramite id
        const modal = document.getElementById('delete-modal');

        //creo una modale con i metodi di bootstrap a partire da quella realizzata nel file modal.blade.php
        const bootstrap_modal = new bootstrap.Modal(modal);

        // mostro la modale
        bootstrap_modal.show();

        // recupero il pulsante di cancellazione
        const confirm_delete = modal.querySelector('#confirm-delete');

        confirm_delete.addEventListener('click', () => {
            button.parentElement.submit();
        })

    })
})

// ---------------------------------------------------------------------------------------------------------------

const modal_login = document.querySelector('.login-modal');

modal_login.addEventListener('click', function (event) {
    // evitiamo che venga cancellato subito il record dal database
    event.preventDefault();

    // recupero la modale tramite id
    const modal = document.getElementById('login-modal');

    //creo una modale con i metodi di bootstrap a partire da quella realizzata nel file modal.blade.php
    const bootstrap_modal = new bootstrap.Modal(modal);

    // mostro la modale
    bootstrap_modal.show();
})
