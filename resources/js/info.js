$(document).ready(function () {
    let elements = [
        $('#allergies_describe'),
        $('#medical_history_describe'),
        $('#link')
    ];

    [
        $('#yesAllergies'),
        $('#yesHistory'),
        $('#yesEpiPen')
    ].map((item, index) => {
        item.click(function () {
            elements[index].removeClass('d-none');
        })
    });

    [
        $('#noAllergies'),
        $('#noHistory'),
        $('#noEpiPen')
    ].map((item, index) => {
        item.click(function () {
            elements[index].addClass('d-none')
        })
    });

    [
        $('#noAllergies:checked').val(),
        $('#noHistory:checked').val(),
        $('#noEpiPen:checked').val()
    ].map((item, index) => {
        if (item === '0')
            elements[index].addClass('d-none');
    });

    let canvas = document.getElementById('canvas');
    let clear = document.getElementById('clear');
    let save = document.getElementById('save');
    let signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });

    save.addEventListener('click', function (event) {
        let data = signaturePad.toDataURL('image/png');
        event.preventDefault();
        window.open(data);
    });
    clear.addEventListener('click', function (event) {
        signaturePad.clear();
        event.preventDefault();
    });

    $('#contact-list').czMore();
    $('#physicians').czMore();
    $('#additional-individuals').czMore();

    $('#infoForm').validate();

    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    $("#infoForm").submit(function(event) {
        let recaptcha = $("#g-recaptcha-response").val();
        if (recaptcha === "") {
            event.preventDefault();
            alert("Please check the recaptcha");
        }
        let inputSignature = $('#signature');
        let data = signaturePad.toDataURL('image/png');
        inputSignature.attr('value', data);
    });
});

