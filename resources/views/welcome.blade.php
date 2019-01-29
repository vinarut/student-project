@extends('layouts.main')
@section('body')

<form class="mt-4">
    <div class="form-group row">
        <label for="child_name" class="col-lg-4 col-sm-2 col-form-label">Child’s Name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="child_name" placeholder="Child’s Name" name="child_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="DOB" class="col-lg-4 col-sm-2 col-form-label">DOB</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="DOB" placeholder="DOB" name="DOB">
        </div>
    </div>
    <div class="form-group row">
        <label for="street_address" class="col-lg-4 col-sm-2 col-form-label">Street Address</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="street_address" placeholder="Street Address" name="street_address">
        </div>
    </div>
    <div class="form-group row">
        <label for="town" class="col-lg-4 col-sm-2 col-form-label">Town</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="town" placeholder="Town" name="town">
        </div>
    </div>
    <div class="form-group row">
        <label for="zip" class="col-lg-4 col-sm-2 col-form-label">Zip</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="zip" placeholder="Zip" name="zip">
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_name" class="col-lg-4 col-sm-2 col-form-label">Mother’s Name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="mother_name" placeholder="Mother’s Name" name="mother_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="home_phone" class="col-lg-4 col-sm-2 col-form-label">Home Phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="home_phone" placeholder="Home Phone" name="home_phone">
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_cell_phone" class="col-lg-4 col-sm-2 col-form-label">Cell Phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="mother_cell_phone" placeholder="Cell Phone" name="mother_cell_phone">
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_employer" class="col-lg-4 col-sm-2 col-form-label">Mother’s Employer</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="mother_employer" placeholder="Mother’s Employer" name="mother_employer">
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_city" class="col-lg-4 col-sm-2 col-form-label">City</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="mother_city" placeholder="City" name="mother_city">
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_state" class="col-lg-4 col-sm-2 col-form-label">State</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="mother_state" placeholder="State" name="mother_state">
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_work_phone" class="col-lg-4 col-sm-2 col-form-label">Work Phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="mother_work_phone" placeholder="Work Phone" name="mother_work_phone">
        </div>
    </div>
    <div class="form-group row">
        <label for="father_name" class="col-lg-4 col-sm-2 col-form-label">Father’s Name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="father_name" placeholder="Father’s Name" name="father_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="father_cell_phone" class="col-lg-4 col-sm-2 col-form-label">Cell Phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="father_cell_phone" placeholder="Cell Phone" name="father_cell_phone">
        </div>
    </div>
    <div class="form-group row">
        <label for="father_employer" class="col-lg-4 col-sm-2 col-form-label">Father’s Employer</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="father_employer" placeholder="Father’s Employer" name="father_employer">
        </div>
    </div>
    <div class="form-group row">
        <label for="father_city" class="col-lg-4 col-sm-2 col-form-label">City</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="father_city" placeholder="City" name="father_city">
        </div>
    </div>
    <div class="form-group row">
        <label for="father_state" class="col-lg-4 col-sm-2 col-form-label">State</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="father_state" placeholder="State" name="father_state">
        </div>
    </div>
    <div class="form-group row">
        <label for="father_work_phone" class="col-lg-4 col-sm-2 col-form-label">Work Phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="father_work_phone" placeholder="Work Phone" name="father_work_phone">
        </div>
    </div>
    <div class="form-group row">
        <label for="primary_email_address" class="col-lg-4 col-sm-2 col-form-label">Primary email address</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="primary_email_address" placeholder="Primary email address" name="primary_email_address">
        </div>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Allergies</legend>
            <div class="col-lg-8 col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="allergies" id="yesAllergies" value="yes">
                    <label class="form-check-label" for="yesAllergies">
                        Yes
                    </label>
                    <textarea class="form-control" type="text" name="allergies_describe" id="allergies_describe"></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="allergies" id="noAllergies" value="no">
                    <label class="form-check-label" for="noAllergies">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Special medical history</legend>
            <div class="col-lg-8 col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="medical_history" id="yesHistory" value="yes">
                    <label class="form-check-label" for="yesHistory">
                        Yes
                    </label>
                    <textarea class="form-control" type="text" name="medical_history_describe" id="medical_history_describe"></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="medical_history" id="noHistory" value="no">
                    <label class="form-check-label" for="noHistory">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Epi pen required?</legend>
            <div class="col-lg-8 col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="epi_pen" id="yesEpiPen" value="yes">
                    <label class="form-check-label" for="yesEpiPen">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="epi_pen" id="noEpiPen" value="no">
                    <label class="form-check-label" for="noEpiPen">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group text-center mt-4">
        EMERGENCY CONTACTS LIST AT LEAST 2 LOCAL NAMES OTHER THAN PARENTS
    </div>
    <div class="form-group row">
        <label for="first_contact_name" class="col-lg-4 col-sm-2 col-form-label">First contacts name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="first_contact_name" placeholder="First contacts name" name="first_contact_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="first_contact_phone" class="col-lg-4 col-sm-2 col-form-label">First contacts phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="first_contact_phone" placeholder="First contacts phone" name="first_contact_phone">
        </div>
    </div>
    <div class="form-group row">
        <label for="first_contact_address" class="col-lg-4 col-sm-2 col-form-label">First contacts address</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="first_contact_address" placeholder="First contacts address" name="first_contact_address">
        </div>
    </div>
    <div class="form-group row">
        <label for="second_contact_name" class="col-lg-4 col-sm-2 col-form-label">Second contacts name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="second_contact_name" placeholder="Second contacts name" name="second_contact_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="second_contact_phone" class="col-lg-4 col-sm-2 col-form-label">Second contacts phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="second_contact_phone" placeholder="Second contacts phone" name="second_contact_phone">
        </div>
    </div>
    <div class="form-group row">
        <label for="second_contact_address" class="col-lg-4 col-sm-2 col-form-label">Second contacts address</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="second_contact_address" placeholder="Second contacts address" name="second_contact_address">
        </div>
    </div>
    <div class="form-group text-center mt-4">
        PHYSICIAN
    </div>
    <div class="form-group row">
        <label for="physician_name" class="col-lg-4 col-sm-2 col-form-label">Physician name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="physician_name" placeholder="Physician name" name="physician_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="physician_phone" class="col-lg-4 col-sm-2 col-form-label">Physician phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="physician_phone" placeholder="Physician phone" name="physician_phone">
        </div>
    </div>
    <div class="form-group text-center mt-4">
        ADDITIONAL INDIVIDUALS THAT MAY PICK UP YOUR CHILD
    </div>
    <div class="form-group row">
        <label for="first_additional_name" class="col-lg-4 col-sm-2 col-form-label">First name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="first_additional_name" placeholder="First name" name="first_additional_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="first_additional_phone" class="col-lg-4 col-sm-2 col-form-label">First phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="first_additional_phone" placeholder="First  phone" name="first_additional_phone">
        </div>
    </div>

    <div class="form-group row">
        <label for="second_additional_name" class="col-lg-4 col-sm-2 col-form-label">Second name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="second_additional_name" placeholder="Second name" name="second_additional_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="second_additional_phone" class="col-lg-4 col-sm-2 col-form-label">Second phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control" id="second_additional_phone" placeholder="Second phone" name="second_additional_phone">
        </div>
    </div>
</form>

<script>
	$(document).ready(function () {
		let yesAllergies = $('yesAllergies');
		console.log(yesAllergies);
		$('yesAllergies').change(function () {
			if (this.value == 'yes') {
				$('allergies_describe').addClass('d-none');
			}
		});
		$('noAllergies').change(function () {
			if (this.value == 'no') {
				$('allergies_describe').removeClass('d-none');
			}
		});
	});
</script>

@endsection