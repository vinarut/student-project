@extends('layouts.main')
@section('body')

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

<form class="mt-4" method="post" action="{{ route('info.store') }}">
    @csrf
    <div class="form-group row">
        <label for="child_name" class="col-lg-4 col-sm-2 col-form-label">Child’s Name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('child_name')? "is-invalid": ""}}" id="child_name"
                   placeholder="Child’s Name" name="child_name" autofocus autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('child_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('child_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="DOB" class="col-lg-4 col-sm-2 col-form-label">DOB</label>
        <div class="col-lg-8 col-sm-10">
            <input type="date" class="form-control {{$errors->has('DOB')? "is-invalid": ""}}" id="DOB" placeholder="DOB"
                   name="DOB" autocomplete="off">
            @if ($errors->has('DOB'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('DOB') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="street_address" class="col-lg-4 col-sm-2 col-form-label">Street Address</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('street_address')? "is-invalid": ""}}"
                   id="street_address" placeholder="Street Address" name="street_address" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('street_address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('street_address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="town" class="col-lg-4 col-sm-2 col-form-label">Town</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('town')? "is-invalid": ""}}" id="town"
                   placeholder="Town" name="town" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('town'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('town') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="zip" class="col-lg-4 col-sm-2 col-form-label">Zip</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('zip')? "is-invalid": ""}}" id="zip" placeholder="Zip"
                   name="zip" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('zip'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('zip') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_name" class="col-lg-4 col-sm-2 col-form-label">Mother’s Name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('mother_name')? "is-invalid": ""}}" id="mother_name"
                   placeholder="Mother’s Name" name="mother_name" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('mother_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mother_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="home_phone" class="col-lg-4 col-sm-2 col-form-label">Home Phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('home_phone')? "is-invalid": ""}}" id="home_phone"
                   placeholder="Home Phone" name="home_phone" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('home_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('home_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_cell_phone" class="col-lg-4 col-sm-2 col-form-label">Cell Phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('mother_cell_phone')? "is-invalid": ""}}"
                   id="mother_cell_phone" placeholder="Cell Phone" name="mother_cell_phone" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('mother_cell_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mother_cell_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_employer" class="col-lg-4 col-sm-2 col-form-label">Mother’s Employer</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('mother_employer')? "is-invalid": ""}}"
                   id="mother_employer" placeholder="Mother’s Employer" name="mother_employer" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('mother_employer'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mother_employer') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_city" class="col-lg-4 col-sm-2 col-form-label">City</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('mother_city')? "is-invalid": ""}}" id="mother_city"
                   placeholder="City" name="mother_city" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('mother_city'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mother_city') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_state" class="col-lg-4 col-sm-2 col-form-label">State</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('mother_state')? "is-invalid": ""}}" id="mother_state"
                   placeholder="State" name="mother_state" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('mother_state'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mother_state') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="mother_work_phone" class="col-lg-4 col-sm-2 col-form-label">Work Phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('mother_work_phone')? "is-invalid": ""}}"
                   id="mother_work_phone" placeholder="Work Phone" name="mother_work_phone" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('mother_work_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mother_work_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="father_name" class="col-lg-4 col-sm-2 col-form-label">Father’s Name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('father_name')? "is-invalid": ""}}" id="father_name"
                   placeholder="Father’s Name" name="father_name" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('father_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('father_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="father_cell_phone" class="col-lg-4 col-sm-2 col-form-label">Cell Phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('father_name')? "is-invalid": ""}}"
                   id="father_cell_phone" placeholder="Cell Phone" name="father_cell_phone" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('father_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('father_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="father_employer" class="col-lg-4 col-sm-2 col-form-label">Father’s Employer</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('father_employer')? "is-invalid": ""}}"
                   id="father_employer" placeholder="Father’s Employer" name="father_employer" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('father_employer'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('father_employer') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="father_city" class="col-lg-4 col-sm-2 col-form-label">City</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('father_city')? "is-invalid": ""}}" id="father_city"
                   placeholder="City" name="father_city" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('father_city'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('father_city') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="father_state" class="col-lg-4 col-sm-2 col-form-label">State</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('father_state')? "is-invalid": ""}}" id="father_state"
                   placeholder="State" name="father_state" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('father_state'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('father_state') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="father_work_phone" class="col-lg-4 col-sm-2 col-form-label">Work Phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('father_work_phone')? "is-invalid": ""}}"
                   id="father_work_phone" placeholder="Work Phone" name="father_work_phone" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('father_work_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('father_work_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="primary_email_address" class="col-lg-4 col-sm-2 col-form-label">Primary email address</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('primary_email_address')? "is-invalid": ""}}"
                   id="primary_email_address" placeholder="Primary email address" name="primary_email_address"
                   autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('primary_email_address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('primary_email_address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Allergies (default "No")</legend>
            <div class="col-lg-8 col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="allergies" id="yesAllergies" value="1">
                    <label class="form-check-label" for="yesAllergies">
                        Yes
                    </label>
                    <textarea class="form-control" type="text" name="allergies_describe" id="allergies_describe"
                              placeholder="Allergies Describe" autocomplete="off"></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="allergies" id="noAllergies" value="0" checked>
                    <label class="form-check-label" for="noAllergies">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Special medical history (default "No")</legend>
            <div class="col-lg-8 col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="medical_history" id="yesHistory" value="1">
                    <label class="form-check-label" for="yesHistory">
                        Yes
                    </label>
                    <textarea class="form-control" type="text" name="medical_history_describe"
                              id="medical_history_describe" placeholder="Medical History Describe" autocomplete="off"></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="medical_history" id="noHistory" value="0"
                           checked>
                    <label class="form-check-label" for="noHistory">
                        No
                    </label>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Epi pen required? (default "No")</legend>
            <div class="col-lg-8 col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="epi_pen" id="yesEpiPen" value="1">
                    <label class="form-check-label" for="yesEpiPen">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="epi_pen" id="noEpiPen" value="0" checked>
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
            <input type="text" class="form-control {{$errors->has('first_contact_name')? "is-invalid": ""}}"
                   id="first_contact_name" placeholder="First contacts name" name="first_contact_name"
                   autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('first_contact_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_contact_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="first_contact_phone" class="col-lg-4 col-sm-2 col-form-label">First contacts phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('first_contact_phone')? "is-invalid": ""}}"
                   id="first_contact_phone" placeholder="First contacts phone" name="first_contact_phone"
                   autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('first_contact_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_contact_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="first_contact_address" class="col-lg-4 col-sm-2 col-form-label">First contacts address</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('first_contact_address')? "is-invalid": ""}}"
                   id="first_contact_address" placeholder="First contacts address" name="first_contact_address"
                   autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('first_contact_address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_contact_address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="second_contact_name" class="col-lg-4 col-sm-2 col-form-label">Second contacts name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('second_contact_name')? "is-invalid": ""}}"
                   id="second_contact_name" placeholder="Second contacts name" name="second_contact_name"
                   autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('second_contact_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('second_contact_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="second_contact_phone" class="col-lg-4 col-sm-2 col-form-label">Second contacts phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('second_contact_phone')? "is-invalid": ""}}"
                   id="second_contact_phone" placeholder="Second contacts phone" name="second_contact_phone"
                   autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('second_contact_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('second_contact_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="second_contact_address" class="col-lg-4 col-sm-2 col-form-label">Second contacts address</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('second_contact_address')? "is-invalid": ""}}"
                   id="second_contact_address" placeholder="Second contacts address" name="second_contact_address"
                   autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('second_contact_address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('second_contact_address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group text-center mt-4">
        PHYSICIAN
    </div>
    <div class="form-group row">
        <label for="physician_name" class="col-lg-4 col-sm-2 col-form-label">Physician name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('physician_name')? "is-invalid": ""}}"
                   id="physician_name" placeholder="Physician name" name="physician_name" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('physician_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('physician_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="physician_phone" class="col-lg-4 col-sm-2 col-form-label">Physician phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('physician_phone')? "is-invalid": ""}}"
                   id="physician_phone" placeholder="Physician phone" name="physician_phone" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('physician_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('physician_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group text-center mt-4">
        ADDITIONAL INDIVIDUALS THAT MAY PICK UP YOUR CHILD
    </div>
    <div class="form-group row">
        <label for="first_additional_name" class="col-lg-4 col-sm-2 col-form-label">First name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('first_additional_name')? "is-invalid": ""}}"
                   id="first_additional_name" placeholder="First name" name="first_additional_name" autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('first_additional_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_additional_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="first_additional_phone" class="col-lg-4 col-sm-2 col-form-label">First phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('first_additional_phone')? "is-invalid": ""}}"
                   id="first_additional_phone" placeholder="First  phone" name="first_additional_phone"
                   autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('first_additional_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_additional_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="second_additional_name" class="col-lg-4 col-sm-2 col-form-label">Second name</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('second_additional_name')? "is-invalid": ""}}"
                   id="second_additional_name" placeholder="Second name" name="second_additional_name"
                   autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('second_additional_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('second_additional_name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="second_additional_phone" class="col-lg-4 col-sm-2 col-form-label">Second phone</label>
        <div class="col-lg-8 col-sm-10">
            <input type="text" class="form-control {{$errors->has('second_additional_phone')? "is-invalid": ""}}"
                   id="second_additional_phone" placeholder="Second phone" name="second_additional_phone"
                   autocomplete="off" value="sdfklsjdf">
            @if ($errors->has('second_additional_phone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('second_additional_phone') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary btn-block mt-4">Send</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function () {
        $('#yesAllergies').click(function () {
            $('#allergies_describe').removeClass('d-none');
        });
        $('#noAllergies').click(function () {
            $('#allergies_describe').addClass('d-none');
        });
        $('#yesHistory').click(function () {
            $('#medical_history_describe').removeClass('d-none');
        });
        $('#noHistory').click(function () {
            $('#medical_history_describe').addClass('d-none');
        });

        if ($('#noAllergies:checked').val() === '0') {
            $('#allergies_describe').addClass('d-none');
        }

        if ($('#noHistory:checked').val() === '0') {
            $('#medical_history_describe').addClass('d-none');
        }

    });
</script>

@endsection