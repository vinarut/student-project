@extends('layouts.app')
@section('content')

<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

<div class="container">
    <form method="post" action="{{ route('info.store') }}" id="infoForm">
        @csrf
        <div class="form-group row">
            <label for="child_name" class="col-lg-4 col-sm-2 col-form-label">Child’s Name</label>
            <div class="col-lg-8 col-sm-10">
                <input type="text" class="form-control {{$errors->has('child_name')? "is-invalid": ""}}" id="child_name"
                       placeholder="Child’s Name" name="child_name" autofocus autocomplete="off"
                       minlength="3" maxlength="255" required>
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
                       name="DOB" autocomplete="off" required>
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
                       id="street_address" placeholder="Street Address" name="street_address" autocomplete="off"
                       minlength="3" maxlength="255" required>
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
                       placeholder="Town" name="town" autocomplete="off"  minlength="2" maxlength="255"
                       required>
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
                       name="zip" autocomplete="off"  minlength="3" maxlength="255" required>
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
                       placeholder="Mother’s Name" name="mother_name" autocomplete="off"  minlength="3"
                       maxlength="255" required>
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
                       placeholder="Home Phone" name="home_phone" autocomplete="off"  minlength="3"
                       maxlength="255" required>
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
                       id="mother_cell_phone" placeholder="Cell Phone" name="mother_cell_phone" autocomplete="off"
                       minlength="3" maxlength="255" required>
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
                       id="mother_employer" placeholder="Mother’s Employer" name="mother_employer" autocomplete="off"
                       minlength="3" maxlength="255" required>
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
                       placeholder="City" name="mother_city" autocomplete="off"  minlength="2" maxlength="255" required>
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
                       placeholder="State" name="mother_state" autocomplete="off"  minlength="3"
                       maxlength="255" required>
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
                       id="mother_work_phone" placeholder="Work Phone" name="mother_work_phone" autocomplete="off"
                       minlength="3" maxlength="255" required>
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
                       placeholder="Father’s Name" name="father_name" autocomplete="off"
                       minlength="3" maxlength="255" required>
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
                       id="father_cell_phone" placeholder="Cell Phone" name="father_cell_phone" autocomplete="off"
                       minlength="3" maxlength="255" required>
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
                       id="father_employer" placeholder="Father’s Employer" name="father_employer" autocomplete="off"
                       minlength="3" maxlength="255" required>
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
                       placeholder="City" name="father_city" autocomplete="off"  minlength="2" maxlength="255" required>
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
                       placeholder="State" name="father_state" autocomplete="off"  minlength="3" maxlength="255" required>
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
                       id="father_work_phone" placeholder="Work Phone" name="father_work_phone" autocomplete="off"
                       minlength="3" maxlength="255" required>
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
                <input type="email" class="form-control {{$errors->has('primary_email_address')? "is-invalid": ""}}"
                       id="primary_email_address" placeholder="Primary email address" name="primary_email_address"
                       autocomplete="off"  minlength="3" maxlength="255" required>
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
                                  placeholder="Allergies Describe" autocomplete="off" maxlength="65535"></textarea>
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
                                  id="medical_history_describe" placeholder="Medical History Describe" autocomplete="off"
                                  maxlength="65535"></textarea>
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
                        <p id="link">Parent and physician must complete the Food Allergy & Anaphylaxis Emergency Care Plan
                            Form and return to Compass. Form can be found
                            <a href="https://compassschoolhouse.com/wp-content/uploads/2018/08/allergy-emergency-care-form.pdf">
                                here</a>.
                        </p>
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
        {{--<div class="form-group row">--}}
        {{--<label class="col-lg-4 col-sm-2 col-form-label">Contacts name</label>--}}
        {{--<div class="col-lg-8 col-sm-10">--}}
        {{--<input type="text" class="form-control {{$errors->has('contact_name')? "is-invalid": ""}}"--}}
        {{--placeholder="Contacts name" name="contact[][name]"--}}
        {{--autocomplete="off"  minlength="3" maxlength="255" required>--}}
        {{--@if ($errors->has('contact_name'))--}}
        {{--<span class="invalid-feedback" role="alert">--}}
        {{--<strong>{{ $errors->first('contact_name') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group row">--}}
        {{--<label class="col-lg-4 col-sm-2 col-form-label">Contacts phone</label>--}}
        {{--<div class="col-lg-8 col-sm-10">--}}
        {{--<input type="text" class="form-control {{$errors->has('contact_phone')? "is-invalid": ""}}"--}}
        {{--placeholder="Contact phone" name="contact[][phone]"--}}
        {{--autocomplete="off"  minlength="3" maxlength="255" required>--}}
        {{--@if ($errors->has('contact_phone'))--}}
        {{--<span class="invalid-feedback" role="alert">--}}
        {{--<strong>{{ $errors->first('contact_phone') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group row">--}}
        {{--<label class="col-lg-4 col-sm-2 col-form-label">Contacts address</label>--}}
        {{--<div class="col-lg-8 col-sm-10">--}}
        {{--<input type="text" class="form-control {{$errors->has('contact_address')? "is-invalid": ""}}"--}}
        {{--placeholder="Contacts address" name="contact[][address]"--}}
        {{--autocomplete="off"  minlength="3" maxlength="255" required>--}}
        {{--@if ($errors->has('contact_address'))--}}
        {{--<span class="invalid-feedback" role="alert">--}}
        {{--<strong>{{ $errors->first('contact_address') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        <div id="contact-list">
            <div class="first">
                <div class="recordset">
                    <div class="form-group row">
                        <label class="col-lg-4 col-sm-2 col-form-label">Contacts name</label>
                        <div class="col-lg-8 col-sm-10">
                            <input type="text" class="form-control {{$errors->has('contact_name')? "is-invalid": ""}}"
                                   placeholder="Contacts name" name="contact[0][name]" autocomplete="off"
                                   minlength="3" maxlength="255" required>
                            @if ($errors->has('contact_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contact_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-sm-2 col-form-label">Contacts phone</label>
                        <div class="col-lg-8 col-sm-10">
                            <input type="text" class="form-control {{$errors->has('contact_phone')? "is-invalid": ""}}"
                                   placeholder="Contact phone" name="contact[0][phone]" autocomplete="off"
                                   minlength="3" maxlength="255" required>
                            @if ($errors->has('contact_phone'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('contact_phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-sm-2 col-form-label">Contacts address</label>
                        <div class="col-lg-8 col-sm-10">
                            <input type="text" class="form-control {{$errors->has('contact_address')? "is-invalid": ""}}"
                                   placeholder="First contacts address" name="contact[0][address]" autocomplete="off"
                                   minlength="3" maxlength="255" required>
                            @if ($errors->has('contact_address'))
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('contact_address') }}</strong>
                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-center mt-lg-5">
            PHYSICIAN
        </div>
        {{--<div class="form-group row">--}}
        {{--<label class="col-lg-4 col-sm-2 col-form-label">Physician name</label>--}}
        {{--<div class="col-lg-8 col-sm-10">--}}
        {{--<input type="text" class="form-control {{$errors->has('physician_name')? "is-invalid": ""}}"--}}
        {{--placeholder="Physician name" name="physician_name[]" autocomplete="off"  minlength="3" maxlength="255" required>--}}
        {{--@if ($errors->has('physician_name'))--}}
        {{--<span class="invalid-feedback" role="alert">--}}
        {{--<strong>{{ $errors->first('physician_name') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group row">--}}
        {{--<label class="col-lg-4 col-sm-2 col-form-label">Physician phone</label>--}}
        {{--<div class="col-lg-8 col-sm-10">--}}
        {{--<input type="text" class="form-control {{$errors->has('physician_phone')? "is-invalid": ""}}"--}}
        {{--placeholder="Physician phone" name="physician_phone[]" autocomplete="off"  minlength="3" maxlength="255" required>--}}
        {{--@if ($errors->has('physician_phone'))--}}
        {{--<span class="invalid-feedback" role="alert">--}}
        {{--<strong>{{ $errors->first('physician_phone') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        <div id="physicians">
            <div class="first">
                <div class="recordset">
                    <div class="form-group row">
                        <label class="col-lg-4 col-sm-2 col-form-label">Physician name</label>
                        <div class="col-lg-8 col-sm-10">
                            <input type="text" class="form-control {{$errors->has('physician_name')? "is-invalid": ""}}"
                                   placeholder="Physician name" name="physician[0][name]" autocomplete="off"
                                   minlength="3" maxlength="255" required>
                            @if ($errors->has('physician_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('physician_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-sm-2 col-form-label">Physician phone</label>
                        <div class="col-lg-8 col-sm-10">
                            <input type="text" class="form-control {{$errors->has('physician_phone')? "is-invalid": ""}}"
                                   placeholder="Physician phone" name="physician[0][phone]" autocomplete="off"
                                   minlength="3" maxlength="255" required>
                            @if ($errors->has('physician_phone'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('physician_phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-center mt-lg-5">
            ADDITIONAL INDIVIDUALS THAT MAY PICK UP YOUR CHILD
        </div>
        {{--<div class="form-group row">--}}
        {{--<label class="col-lg-4 col-sm-2 col-form-label">Additional name</label>--}}
        {{--<div class="col-lg-8 col-sm-10">--}}
        {{--<input type="text" class="form-control {{$errors->has('additional_name')? "is-invalid": ""}}"--}}
        {{--placeholder="Additional name" name="additional_name[]" autocomplete="off"  minlength="3" maxlength="255" required>--}}
        {{--@if ($errors->has('additional_name'))--}}
        {{--<span class="invalid-feedback" role="alert">--}}
        {{--<strong>{{ $errors->first('additional_name') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group row">--}}
        {{--<label class="col-lg-4 col-sm-2 col-form-label">Additional phone</label>--}}
        {{--<div class="col-lg-8 col-sm-10">--}}
        {{--<input type="text" class="form-control {{$errors->has('additional_phone')? "is-invalid": ""}}"--}}
        {{--placeholder="Additional phone" name="additional_phone[]"--}}
        {{--autocomplete="off"  minlength="3" maxlength="255" required>--}}
        {{--@if ($errors->has('additional_phone'))--}}
        {{--<span class="invalid-feedback" role="alert">--}}
        {{--<strong>{{ $errors->first('additional_phone') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        <div id="additional-individuals">
            <div class="first">
                <div class="recordset">
                    <div class="form-group row">
                        <label class="col-lg-4 col-sm-2 col-form-label">Additional name</label>
                        <div class="col-lg-8 col-sm-10">
                            <input type="text" class="form-control {{$errors->has('additional_name')? "is-invalid": ""}}"
                                   placeholder="Additional name" name="additional[0][name]" autocomplete="off"
                                   minlength="3" maxlength="255" required>
                            @if ($errors->has('additional_name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('additional_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-sm-2 col-form-label">Additional phone</label>
                        <div class="col-lg-8 col-sm-10">
                            <input type="text" class="form-control {{$errors->has('additional_phone')? "is-invalid": ""}}"
                                   placeholder="Additional phone" name="additional[0][phone]" autocomplete="off"
                                   minlength="3" maxlength="255" required>
                            @if ($errors->has('additional_phone'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('additional_phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary btn-block mt-4">Send</button>
            </div>
        </div>
    </form>
</div>

@endsection