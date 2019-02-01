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

	// let validator = $('#infoForm').validate();
	// validator.form();
	$('#infoForm').validate({
		submitHandler: function(form) {

		},
		rules: {
			child_name: 'required',
			DOB: 'required',
			town: 'required',
			zip: 'required',
			mother_name: 'required',
			home_phone: 'required',
			mother_cell_phone: 'required',
			mother_employer: 'required',
			mother_city: 'required',
			mother_state: 'required',
			mother_work_phone: 'required',
			father_name: 'required',
			father_cell_phone: 'required',
			father_employer: 'required',
			father_city: 'required',
			father_state: 'required',
			father_work_phone: 'required',
			primary_email_address: 'required'
		},
		messages: {
			child_name: {
				required: 'Please enter child name'
			},
			DOB: {
				required: 'Please enter date of birth'
			},
			town: {
				required: 'Please enter town',
			},
			zip: {
				required: 'Please enter zip',
			},
			mother_name: {
				required: 'Please enter mother name',
			},
			home_phone: {
				required: 'Please enter home phone',
			},
			mother_cell_phone: {
				required: 'Please enter mother cell phone',
			},
			mother_employer: {
				required: 'Please enter mother employer',
			},
			mother_city: {
				required: 'Please enter mother city',
			},
			mother_state: {
				required: 'Please enter mother state',
			},
			mother_work_phone: {
				required: 'Please enter mother work phone',
			},
			father_name: {
				required: 'Please enter father name',
			},
			father_cell_phone: {
				required: 'Please enter father cell phone',
			},
			father_employer: {
				required: 'Please enter father employer',
			},
			father_city: {
				required: 'Please enter father city',
			},
			father_state: {
				required: 'Please enter father state',
			},
			father_work_phone: {
				required: 'Please enter father work phone',
			},
			primary_email_address: {
				required: 'We need your email address to contact you'
			},
		}
	});
});
