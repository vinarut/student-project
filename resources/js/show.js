$(document).ready(function () {

    let img = $('#img').get(0);

    if (!img) return;

    let decodeSignature = $('#decodeSignature').get(0);
    $(decodeSignature).css('width', img.naturalWidth);
    $(decodeSignature).css('height', img.naturalHeight);
    $(decodeSignature).css('background', 'url(' + img.src + ')');

});