const CryptoJS = require("crypto-js");

$(document).ready(function () {

    let name = $('#name');
    let surname = $('#surname');
    let token = $('#token');
    token.val("");
    let btnGenerate = $('#btnGenerate');
    btnGenerate.click(function () {
        let timestamp = new Date().getTime().toString();
        let hash = CryptoJS.SHA256(name.val() + surname.val() + timestamp);
        token.val(hash.toString());
        token.removeClass('d-none');
    });

    $('div.alert').not('.alert-important').delay(5000).fadeOut(350);

    $("#adminForm").submit(function(event) {
        let tokenField = $('#token');
        if (tokenField.val() === "") {
            event.preventDefault();
            alert('Please generate token');
        }
    });
});