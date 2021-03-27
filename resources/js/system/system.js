require('../bootstrap');

window.$ = window.jQuery = require('jquery'); // Include jQuery
// window.Swiper = require('../public/layout/libraries/swiper'); // Include Swiper.js

// // ** Select 2 ** //
// require('../layout/select2');

// // ** Notify.js Library ** //
// require('../layout/notify');

// ** Filters.js ** //
require('./template/includes/filters');

// ** Script for photo upload and live preview ** //
require('./template/includes/photo-upload');

$(document).ready(function() {
    $('.select-2').select2();
});

require('./template/menu');                            // ** Include menu ** //
require('./template/snippets.js');                     // ** Include basic triggers ** //
require('./pages/login');                              // ** Include login system ** //

require('./pages/products/product');                   // ** Include products JS ** //

// $(document).ready(function() {
// // ** Include some chart functions -- show more details in orders **//
//     require('../public/app/shop/cart/includes/more-details');
// });


// ------------------------------------------------------------------------------------------------------------------ //
// *************************************************** PUSHER.JS **************************************************** //

