jQuery( document ).ready( function( $ ) {

    // TOGGLE MENU
    document.getElementById('main-menu-toggle').addEventListener('click', () => {
        console.log('clicked')
        document.getElementById('main-nav').classList.toggle('menu-open')
    })

    document.querySelectorAll('#main-nav .primary-nav a.dropdown').forEach( (dropdown) => {
        dropdown.addEventListener('click', () => {
            dropdown.classList.toggle('open')
        })
    })

});