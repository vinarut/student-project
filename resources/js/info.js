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

    let canvas = $('#canvas').get(0);
    let clear = $('#clear').get(0);
    let save = $('#save').get(0);
    let signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });

    $(save).on('click', function (event) {
        let data = signaturePad.toDataURL('image/png');
        event.preventDefault();
        window.open(data);
    });
    $(clear).on('click', function (event) {
        signaturePad.clear();
        event.preventDefault();
    });

    let telInputs = $("input[type='tel']");
    telInputs = Array.from(telInputs);
    telInputs.map(item => {
        $(item).on('input', function () {
            $(document).on('keydown', function (event) {
                if (event.keyCode === 8 || event.keyCode === 46)
                    return;
                if ((item.value.length === 3 || item.value.length === 7))
                    item.value += '-';
            })
        })
    });
    
    telInputs.map(item => {
        $(item).on('change', function () {
            let result = item.value.match(/[0-9]{3}-[0-9]{3}-[0-9]{4}/i);
            if (result !== null)
                return;
            console.log(result);
        })
    });

    let btnPlus = $("div[class='btnPlus']").get();
    // let arrayPlus = Array.from(btnPlus);
    console.log(btnPlus);

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

