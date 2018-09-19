import 'bootstrap/dist/js/bootstrap.bundle.min.js';

$(document).ready(function() {  

    $('#formdir').hide();

    $("#btnperfil").click(function(e) {
        e.preventDefault();
        $('#formdir').toggle();

    })




});