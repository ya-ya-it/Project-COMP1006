/**
 * File name: app.js
 * Author's name: Daria Davydenko
 * Student ID: 200335788
 * Website name: Todos
 * http://gc200335788.computerstudi.es/Project/
 *
 * This is a JS file for a site. Here there is all main scripts.
 */



/*
 * This function confirms users' action after delete button pressed
 */
$('.confirm').on('click', function () {
    return confirm('Are you sure you want to delete it?');
});