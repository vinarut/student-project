$(document).ready(function () {
    //reset all fields in form (radio)
    clearForm.reset();

    let infoForm = $('#infoForm');

    let anotherChild = $('#another_child');

    initializeDatepicker();

    let elements = [
        $('#allergies_describe'),
        $('#medical_history_describe'),
        $('#link')
    ];

    [
        $('#yesAllergies'),
        $('#yesHistory'),
        $('#yesEpiPen')
    ].forEach((item, index) => {
        item.click(function () {
            elements[index].removeClass('d-none');
        })
    });

    [
        $('#noAllergies'),
        $('#noHistory'),
        $('#noEpiPen')
    ].forEach((item, index) => {
        item.click(function () {
            elements[index].addClass('d-none')
        })
    });

    [
        $('#noAllergies:checked').val(),
        $('#noHistory:checked').val(),
        $('#noEpiPen:checked').val()
    ].forEach((item, index) => {
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
    radioYes.forEach((item, index) => {
        $(item).on('click', function () {
            describe[index].addClass('is-invalid');
        })
    });
    radioNo.forEach((item, index) => {
        $(item).on('click', function () {
            describe[index].removeClass('is-invalid');
        })
    });
    
    describe.forEach(item => {
        item.on('input', function () {
            if (item.val() !== '')
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

            for (let tel of telInputs) {
                $(tel).on('input', function () {
                    $(document).on('keydown', function (event) {
                        if (event.keyCode === 8 || event.keyCode === 46)
                            return;
                        if ((tel.value.length === 3 || tel.value.length === 7))
                            tel.value += '-';
                    })
                });

                $(tel).on('change', function () {
                    let result = tel.value.match(/[0-9]{3}-[0-9]{3}-[0-9]{4}/i);
                    if (result !== null) {
                        $(tel).removeClass('is-invalid');
                        return;
                    }
                    $(tel).addClass('is-invalid');
                })
            }

            infoForm.validate();
        },
        onLoad: function(index) {
            infoForm.validate();
        },
        onDelete: function(id) {
            infoForm.validate();
        }
    });

    infoForm.validate();

    $('div.alert').not('.alert-important').delay(7000).fadeOut(350);

    infoForm.submit(function(event) {
        let radioBtn = $("input[type='radio']");
        let checkedRadioBtn = 0;
        for (let radio of radioBtn)
            if (radio.checked)
                checkedRadioBtn++;

        if (checkedRadioBtn < 5) {
            event.preventDefault();
            alert('Please check all switches, maybe you forgot to make a choice.');
        }

        let recaptcha = $("#g-recaptcha-response").val();
        if (recaptcha === "") {
            event.preventDefault();
            alert('Please check the recaptcha.');
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

        let isInvalid = invalidInputs.some(item => {
            return item.length > 0;
        });

        if (isInvalid) {
            event.preventDefault();
            alert('Please check the fields entered.');
        }
    });
});

function initializeDatepicker() {
    $('.dob, .date').datepicker({
        startView: 2,
        todayBtn: "linked",
        clearBtn: true
    });
}