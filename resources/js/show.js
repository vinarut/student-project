$(document).ready(function () {

    let inputSignature = $('#inputSignature');
    let decodeSignature = $('#decodeSignature');
    let signature = new Image();
    signature.src = inputSignature.val();
    decodeSignature.css('width', signature.naturalWidth);
    decodeSignature.css('height', signature.naturalHeight);
    decodeSignature.css('background', 'url(' + signature.src + ')');

});