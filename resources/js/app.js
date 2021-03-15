require('./bootstrap');
const turbolinks = require('turbolinks');

require('alpinejs');

document.addEventListener("livewire:load", function(event) {
    turbolinks.start();
});
