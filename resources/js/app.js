import './bootstrap';
import 'admin-lte';

document.addEventListener("DOMContentLoaded", function(event) {
    updateEvents();
    setTimeout(updateEvents, 30000);
});

let updateEvents = function() {
    let xhr = new XMLHttpRequest();

    xhr.open('GET', '/ajax/get_events');
    xhr.send();
    xhr.onload = function() {
        let elem = document.getElementById('menu-events');
        elem.innerHTML = xhr.response;
    };
}
