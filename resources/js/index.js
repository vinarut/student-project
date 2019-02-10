$(document).ready(function () {

    new ClipboardJS('#clipboard')
        .on('success', function (e) {
            console.log(e);
        });
    
});