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

	$('#contact-list').czMore();
	$('#physicians').czMore();
	$('#additional-individuals').czMore();

	$('#infoForm').validate();

	$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
});
