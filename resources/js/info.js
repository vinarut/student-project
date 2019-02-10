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

    let radioYes = [
        $('#yesAllergies').get(0),
        $('#yesHistory').get(0),
    ];
    let radioNo = [
        $('#noAllergies').get(0),
        $('#noHistory').get(0),
    ];
    let describe = [
        $('#allergies_describe'),
        $('#medical_history_describe')
    ];
    radioYes.map((item, index) => {
        $(item).on('click', function () {
            describe[index].addClass('is-invalid');
        })
    });
    radioNo.map((item, index) => {
        $(item).on('click', function () {
            describe[index].removeClass('is-invalid');
        })
    });
    
    describe.map(item => {
        item.on('input', function () {
            if (item.val().length > 0)
                item.removeClass('is-invalid');
            else
                item.addClass('is-invalid');
        })
    });

    let canvas = $('#canvas').get(0);
    let clear = $('#clear').get(0);
    canvas.height = canvas.offsetHeight;
    canvas.width = canvas.offsetWidth;
    let signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });

    $(window).on('resize', function () {
        canvas.height = canvas.offsetHeight;
        canvas.width = canvas.offsetWidth;
        signaturePad.clear();
    });

    $(clear).on('click', function (event) {
        signaturePad.clear();
        event.preventDefault();
    });

    let zip = $('#zip').get(0);
    $(zip).on('change', function () {
        let result = zip.value.match(/[0-9]{5,}/i);
        if (result !== null) {
            $(zip).removeClass('is-invalid');
            return;
        }
        $(zip).addClass('is-invalid');
    });

    $('#physicians, #additional-individuals, #contact-list').czMore({
        onAdd: function(index) {
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
                    if (result !== null) {
                        $(item).removeClass('is-invalid');
                        return;
                    }
                    $(item).addClass('is-invalid');
                })
            });
            $('#infoForm').validate();
        },
        onLoad: function(index) {
            $('#infoForm').validate();
        },
        onDelete: function(id) {
            $('#infoForm').validate();
        }
    });

    $('#infoForm').validate();

    $('div.alert').not('.alert-important').delay(5000).fadeOut(350);

    $("#infoForm").submit(function(event) {
        let recaptcha = $("#g-recaptcha-response").val();
        if (recaptcha === "") {
            event.preventDefault();
            alert("Please check the recaptcha");
        }
        let inputSignature = $('#signature');
        let data = signaturePad.toDataURL('image/png');
        inputSignature.attr('value', data);

        let invalidInputs = [
            $('input.error'),
            $('input.is-invalid'),
            $('textarea.error'),
            $('textarea.is-invalid')
        ];

        let i = 0;
        invalidInputs.map(item => {
            if (item.length > 0) {
                i++;
            }
        });
        if (i > 0) {
            event.preventDefault();
            alert('Please check the fields entered');
        }
    });
});

