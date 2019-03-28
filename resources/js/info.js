$(document).ready(function () {
    //очищаем все поля формы + чекбоксы + радиобаттоны
    clearForm.reset();

    //инициализация календаря
    initializeDatepicker();

    //все необходимые элементы
    let infoForm = $('#infoForm');
    let allergiesDescribe = $('#allergies_describe');
    let medicalHistoryDescribe = $('#medical_history_describe');
    let link = $('#link');
    let yesAllergies = $('#yesAllergies');
    let yesHistory = $('#yesHistory');
    let yesEpiPen = $('#yesEpiPen');
    let noAllergies = $('#noAllergies');
    let noHistory = $('#noHistory');
    let noEpiPen = $('#noEpiPen');

    let physicians = $('#physicians');
    let additionalIndividuals = $('#additional-individuals');
    let contactList = $('#contact-list');

    //канвас
    let canvas = $('#canvas').get(0);
    let clear = $('#clear');

    let zip = $('#zip').get(0);

    //массив элементов для радиобаттонов "Yes"
    let elementsForYesRadioBtn = [allergiesDescribe, medicalHistoryDescribe, link];

    //массив пложительных переключателей
    let yesRadioBtn = [yesAllergies, yesHistory, yesEpiPen];

    //для каждого элемента удаляем класс d-none, если не выбран положительный переключатель
    yesRadioBtn.forEach((item, index) => {
        item.click(function () {
            elementsForYesRadioBtn[index].removeClass('d-none');
        })
    });

    //массив отрицательных переключателей
    let noRadioBtn = [noAllergies, noHistory, noEpiPen];

    //навешиваем клас d-none, если поле пустое
    noRadioBtn.forEach((item, index) => {
        item.click(function () {
            elementsForYesRadioBtn[index].addClass('d-none')
        })
    });

    //по клику на положительный радиобаттон навешиваем класс is-invalid на текстарею
    //возможно стоит пересмотреть
    [yesAllergies, yesHistory].forEach((item, index) => {
        $(item).on('click', function () {
            describe[index].addClass('is-invalid');
        })
    });

    //текстареи
    let describe = [allergiesDescribe, medicalHistoryDescribe];

    //по клику на отрицательный радиобаттон убираем класс is-invalid с текстареи
    [noAllergies, noHistory].forEach((item, index) => {
        item.on('click', function () {
            describe[index].removeClass('is-invalid');
        })
    });

    for (let item of describe) {
        item.on('input', function () {
            if (item.val() !== '')
                item.removeClass('is-invalid');
            else
                item.addClass('is-invalid');
        })
    }

    //инициализация панели
    canvas.height = canvas.offsetHeight;
    canvas.width = canvas.offsetWidth;
    let signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });

    //очистка панели при изменении размера экрана
    $(window).on('resize', function () {
        canvas.height = canvas.offsetHeight;
        canvas.width = canvas.offsetWidth;
        signaturePad.clear();
    });

    clear.on('click', function (event) {
        signaturePad.clear();
        event.preventDefault();
    });

    $(zip).on('change', function () {
        let result = zip.value.match(/[0-9]{5,}/i);
        if (result !== null) {
            $(zip).removeClass('is-invalid');
            return;
        }
        $(zip).addClass('is-invalid');
    });

    $(physicians,additionalIndividuals, contactList).czMore({
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
        if (checkInvalidInputs()) {
            event.preventDefault();
            alert('Please check the fields entered.');
        }

        if (checkRadioBtn()) {
            event.preventDefault();
            alert('Please check all switches, maybe you forgot to make a choice.');
        }

        if (checkReCaptcha()) {
            event.preventDefault();
            alert('Please check the recaptcha.');
        }

        let inputSignature = $('#signature');
        let data = signaturePad.toDataURL('image/png');
        inputSignature.attr('value', data);
    });
});

function initializeDatepicker() {
    $('.dob, .date').datepicker({
        startView: 2,
        todayBtn: "linked",
        clearBtn: true
    });
}

function checkRadioBtn() {
    let radioBtn = $("input[type='radio']");
    let checkedRadioBtn = 0;
    for (let radio of radioBtn)
        if (radio.checked)
            checkedRadioBtn++;

    return checkedRadioBtn < 5;
}

function checkInvalidInputs() {
    return [$('input.error'), $('input.is-invalid'), $('textarea.error'), $('textarea.is-invalid')].some(item => {
        return item.length > 0;
    });
}

function checkReCaptcha() {
    return $("#g-recaptcha-response").val() === "";
}