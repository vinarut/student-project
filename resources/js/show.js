$(document).ready(function () {

    let inputSignature = $('#inputSignature');
    let decodeSignature = $('#decodeSignature');
    let signature = new Image();
    signature.src = inputSignature.val();
    decodeSignature.css('width', 400);
    decodeSignature.css('height', 200);
    decodeSignature.css('background', 'url(' + signature.src + ')');

});