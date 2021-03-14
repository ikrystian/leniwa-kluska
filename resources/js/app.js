require('./bootstrap');
const turbolinks = require('turbolinks');

require('alpinejs');

document.addEventListener("livewire:load", function(event) {
    turbolinks.start();
});


let stats =  document.querySelector('#full-size-stats');
document.querySelector('#showStats').addEventListener('click', function () {
    stats.style.display = 'flex';
});

stats.addEventListener('click', function () {
    stats.style.display = 'none';
})
