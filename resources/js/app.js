require('./bootstrap');
import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', function() {
    new Splide('.splide').mount(); // Replace '.splide' with the appropriate selector for your slider container.
});