@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            @include('flash::message')
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h4 class="card-title">STUDENT REGISTRATION 2018-2019</h4>
            <form method="post" action="{{ route('info.store', ['token'=>$token]) }}" id="infoForm">
                @csrf
                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label">Child’s Name</label>
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
                    <label class="col-lg-4 col-sm-2 col-form-label">DOB</label>
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
                    <label class="col-lg-4 col-sm-2 col-form-label">Street Address</label>
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
                    <label class="col-lg-4 col-sm-2 col-form-label">Town</label>
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
                    <label class="col-lg-4 col-sm-2 col-form-label">Zip</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="text" class="form-control {{$errors->has('zip')? "is-invalid": ""}}" id="zip" placeholder="Zip"
                               name="zip" autocomplete="off" pattern="[0-9]{5,}" minlength="5" required>
                        @if ($errors->has('zip'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('zip') }}</strong>
                            </span>
                        @endif
                        <small>Example: 00000</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label">Mother’s Name</label>
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
                    <label class="col-lg-4 col-sm-2 col-form-label">Home Phone</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="tel" class="form-control {{$errors->has('home_phone')? "is-invalid": ""}}"
                               id="home_phone" placeholder="Home Phone" name="home_phone" autocomplete="off"
                               pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12"
                               title="Number must be 10 digits" required>
                        @if ($errors->has('home_phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('home_phone') }}</strong>
                            </span>
                        @endif
                        <small>Example: 000-000-0000</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label">Cell Phone</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="tel" class="form-control {{$errors->has('mother_cell_phone')? "is-invalid": ""}}"
                               id="mother_cell_phone" placeholder="Cell Phone" name="mother_cell_phone" autocomplete="off"
                               pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12"
                               title="Number must be 10 digits" required>
                        @if ($errors->has('mother_cell_phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mother_cell_phone') }}</strong>
                            </span>
                        @endif
                        <small>Example: 000-000-0000</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label">Mother’s Employer</label>
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
                    <label class="col-lg-4 col-sm-2 col-form-label">City</label>
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
                    <label class="col-lg-4 col-sm-2 col-form-label">State</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="text" class="form-control {{$errors->has('mother_state')? "is-invalid": ""}}" id="mother_state"
                               placeholder="State" name="mother_state" autocomplete="off"  minlength="2"
                               maxlength="255" required>
                        @if ($errors->has('mother_state'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mother_state') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label">Work Phone</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="tel" class="form-control {{$errors->has('mother_work_phone')? "is-invalid": ""}}"
                               id="mother_work_phone" placeholder="Work Phone" name="mother_work_phone" autocomplete="off"
                               pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12"
                               title="Number must be 10 digits" required>
                        @if ($errors->has('mother_work_phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mother_work_phone') }}</strong>
                            </span>
                        @endif
                        <small>Example: 000-000-0000</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label">Father’s Name</label>
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
                    <label class="col-lg-4 col-sm-2 col-form-label">Cell Phone</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="tel" class="form-control {{$errors->has('father_name')? "is-invalid": ""}}"
                               id="father_cell_phone" placeholder="Cell Phone" name="father_cell_phone" autocomplete="off"
                               pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12"
                               title="Number must be 10 digits" required>
                        @if ($errors->has('father_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('father_name') }}</strong>
                            </span>
                        @endif
                        <small>Example: 000-000-0000</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label">Father’s Employer</label>
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
                    <label class="col-lg-4 col-sm-2 col-form-label">City</label>
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
                    <label class="col-lg-4 col-sm-2 col-form-label">State</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="text" class="form-control {{$errors->has('father_state')? "is-invalid": ""}}" id="father_state"
                               placeholder="State" name="father_state" autocomplete="off"  minlength="2" maxlength="255" required>
                        @if ($errors->has('father_state'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('father_state') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label">Work Phone</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="tel" class="form-control {{$errors->has('father_work_phone')? "is-invalid": ""}}"
                               id="father_work_phone" placeholder="Work Phone" name="father_work_phone" autocomplete="off"
                               pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12"
                               title="Number must be 10 digits" required>
                        @if ($errors->has('father_work_phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('father_work_phone') }}</strong>
                            </span>
                        @endif
                        <small>Example: 000-000-0000</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label">Primary email address</label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="email" class="form-control {{$errors->has('primary_email_address')? "is-invalid": ""}}"
                               id="primary_email_address" placeholder="Primary email address" name="primary_email_address"
                               autocomplete="off" maxlength="255" required>
                        @if ($errors->has('primary_email_address'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('primary_email_address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Allergies</legend>
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
                        <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Special medical history</legend>
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

                <div class="form-group row">
                    <div class="col-lg-12 col-sm-12">
                        <p>
                            I authorize the director or supervising staff person to take whatever measures may be
                            necessary to obtain medical care if warranted. These steps may include, but are not limited to
                            the following:</p>
                        <ul class="font-weight-bold">
                            <li>Attempt to contact parent or guardian.</li>
                            <li>Attempt to contact the child’s physician.</li>
                            <li>Attempt to contact a parent through any of the emergency names listed above.</li>
                        </ul>
                        <p>
                            In the event of a medical emergency as deemed necessary by the director, we will do any or
                            all of the following o Call another physician or paramedics</p>
                        <ul class="font-weight-bold">
                            <li>Call an ambulance.</li>
                            <li>Have the child taken to an emergency hospital in the company of a staff member.</li>
                            <li>Any expenses incurred will be the responsibility of the child’s family.</li>
                        </ul>
                    </div>
                </div>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Epi pen required?</legend>
                        <div class="col-lg-8 col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="epi_pen" id="yesEpiPen" value="1">
                                <label class="form-check-label" for="yesEpiPen">
                                    Yes
                                </label>
                                <p id="link">Parent and physician must complete the Food Allergy & Anaphylaxis Emergency Care Plan
                                    Form and return to Compass. Form can be found
                                    <a href="https://compassschoolhouse.com/wp-content/uploads/2018/08/allergy-emergency-care-form.pdf"
                                    target="_blank">
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

                <h4 class="card-title mt-5">Emergency Contacts List At Least 2 Local Names Other Than Parents</h4>

                <div>
                    @foreach (range(0,1) as $k)
                        <div class="form-group row">
                            <label class="col-lg-4 col-sm-2 col-form-label">Contacts name</label>
                            <div class="col-lg-8 col-sm-10">
                                <input type="text" class="form-control {{$errors->has('contact.'.$k.'.name')? "is-invalid": ""}}"
                                       placeholder="Contacts name" name="contact[{{$k}}][name]" autocomplete="off"
                                       minlength="3" maxlength="255" required>
                                @if ($errors->has('contact.'.$k.'.name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact.'.$k.'.name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-sm-2 col-form-label">Contacts phone</label>
                            <div class="col-lg-8 col-sm-10">
                                <input type="tel" class="form-control {{$errors->has('contact.'.$k.'.phone')? "is-invalid": ""}}"
                                       placeholder="Contact phone" name="contact[{{$k}}][phone]" autocomplete="off"
                                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12"
                                       title="Number must be 10 digits" required>
                                @if ($errors->has('contact.'.$k.'.phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact.'.$k.'.phone') }}</strong>
                                    </span>
                                @endif
                                <small>Example: 000-000-0000</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-sm-2 col-form-label">Contacts address</label>
                            <div class="col-lg-8 col-sm-10">
                                <input type="text" class="form-control {{$errors->has('contact.'.$k.'.address')? "is-invalid": ""}}"
                                       placeholder="First contacts address" name="contact[{{$k}}][address]" autocomplete="off"
                                       minlength="3" maxlength="255" required>
                                @if ($errors->has('contact.'.$k.'.address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact.'.$k.'.address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-sm-2 col-form-label">Relationship to Child</label>
                            <div class="col-lg-8 col-sm-10">
                                <textarea type="text" class="form-control {{$errors->has('contact.'.$k.'.relation')? "is-invalid": ""}}"
                                          placeholder="Relationship to сhild" name="contact[{{$k}}][relation]"
                                          autocomplete="off" maxlength="65535" required></textarea>
                                @if ($errors->has('contact.'.$k.'.relation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contact.'.$k.'.relation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="contact-list">
                    <div class="first">
                        <div class="recordset">
                            <div class="form-group row">
                                <label class="col-lg-4 col-sm-2 col-form-label pl-0">Contacts name</label>
                                <div class="col-lg-8 col-sm-10">
                                    <input type="text" class="form-control"
                                           placeholder="Contacts name" name="contact[2][name]" autocomplete="off"
                                           minlength="3" maxlength="255" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-sm-2 col-form-label">Contacts phone</label>
                                <div class="col-lg-8 col-sm-10">
                                    <input type="tel" class="form-control"
                                           placeholder="Contact phone" name="contact[2][phone]" autocomplete="off"
                                           pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12"
                                           title="Number must be 10 digits" required>
                                    <small>Example: 000-000-0000</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-sm-2 col-form-label">Contacts address</label>
                                <div class="col-lg-8 col-sm-10">
                                    <input type="text" class="form-control"
                                           placeholder="First contacts address" name="contact[2][address]" autocomplete="off"
                                           minlength="3" maxlength="255" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-sm-2 col-form-label">Relationship to Child</label>
                                <div class="col-lg-8 col-sm-10">
                                    <textarea type="text" class="form-control" placeholder="Relationship to child"
                                              name="contact[0][relation]" autocomplete="off" maxlength="65535"
                                              required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="card-title mt-5">Physicians</h4>

                <div>
                    @foreach (range(0,0) as $k)
                        <div class="form-group row">
                            <label class="col-lg-4 col-sm-2 col-form-label">Physician name</label>
                            <div class="col-lg-8 col-sm-10">
                                <input type="text" class="form-control {{$errors->has('physician.'.$k.'.name')? "is-invalid": ""}}"
                                       placeholder="Physician name" name="physician[{{$k}}][name]" autocomplete="off"
                                       minlength="3" maxlength="255" required>
                                @if ($errors->has('physician.'.$k.'.name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('physician.'.$k.'.name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-sm-2 col-form-label">Physician phone</label>
                            <div class="col-lg-8 col-sm-10">
                                <input type="tel" class="form-control {{$errors->has('physician.'.$k.'.phone')? "is-invalid": ""}}"
                                       placeholder="Physician phone" name="physician[{{$k}}][phone]" autocomplete="off"
                                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12"
                                       title="Number must be 10 digits" required>
                                @if ($errors->has('physician.'.$k.'.phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('physician.'.$k.'.phone') }}</strong>
                                    </span>
                                @endif
                                <small>Example: 000-000-0000</small>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="physicians">
                    <div class="first">
                        <div class="recordset">
                            <div class="form-group row">
                                <label class="col-lg-4 col-sm-2 col-form-label pl-0">Physician name</label>
                                <div class="col-lg-8 col-sm-10">
                                    <input type="text" class="form-control"
                                           placeholder="Physician name" name="physician[1][name]" autocomplete="off"
                                           minlength="3" maxlength="255" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-sm-2 col-form-label">Physician phone</label>
                                <div class="col-lg-8 col-sm-10">
                                    <input type="tel" class="form-control" placeholder="Physician phone"
                                           name="physician[1][phone]" autocomplete="off" minlength="12" maxlength="12"
                                           pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Number must be 10 digits" required>
                                    <small>Example: 000-000-0000</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="card-title mt-5">Additional Individuals That May Pick Up Your Child</h4>

                <div>
                    @foreach (range(0,1) as $k)
                        <div class="form-group row">
                            <label class="col-lg-4 col-sm-2 col-form-label">Additional name</label>
                            <div class="col-lg-8 col-sm-10">
                                <input type="text" class="form-control {{$errors->has('additional.'.$k.'.name')? "is-invalid": ""}}"
                                       placeholder="Additional name" name="additional[{{$k}}][name]" autocomplete="off"
                                       minlength="3" maxlength="255" required>
                                @if ($errors->has('additional.'.$k.'.name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('additional.'.$k.'.name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-sm-2 col-form-label">Additional phone</label>
                            <div class="col-lg-8 col-sm-10">
                                <input type="tel" class="form-control {{$errors->has('additional.'.$k.'.phone')? "is-invalid": ""}}"
                                       placeholder="Additional phone" name="additional[{{$k}}][phone]" autocomplete="off"
                                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12"
                                       title="Number must be 10 digits" required>
                                @if ($errors->has('additional.'.$k.'.phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('additional.'.$k.'.phone') }}</strong>
                                    </span>
                                @endif
                                <small>Example: 000-000-0000</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-sm-2 col-form-label">Relationship to Child</label>
                            <div class="col-lg-8 col-sm-10">
                                <textarea type="text" class="form-control {{$errors->has('additional.'.$k.'.relation')? "is-invalid": ""}}"
                                          placeholder="Relationship to сhild" name="additional[{{$k}}][relation]"
                                          autocomplete="off" maxlength="65535" required></textarea>
                                @if ($errors->has('additional.'.$k.'.relation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('additional.'.$k.'.relation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="additional-individuals">
                    <div class="first">
                        <div class="recordset">
                            <div class="form-group row">
                                <label class="col-lg-4 col-sm-2 col-form-label pl-0">Additional name</label>
                                <div class="col-lg-8 col-sm-10">
                                    <input type="text" class="form-control"
                                           placeholder="Additional name" name="additional[2][name]" autocomplete="off"
                                           minlength="3" maxlength="255" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-sm-2 col-form-label">Additional phone</label>
                                <div class="col-lg-8 col-sm-10">
                                    <input type="tel" class="form-control"
                                           placeholder="Additional phone" name="additional[2][phone]" autocomplete="off"
                                           pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" minlength="12" maxlength="12"
                                           title="Number must be 10 digits" required>
                                    <small>Example: 000-000-0000</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-sm-2 col-form-label">Relationship to Child</label>
                                <div class="col-lg-8 col-sm-10">
                                    <textarea type="text" class="form-control" placeholder="Relationship to child"
                                              name="additional[2][relation]" autocomplete="off" maxlength="65535"
                                              required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="card-title mt-5">RELEASE FORM</h4>

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        I have read and understand the information contained in the Compass Schoolhouse Family Handbook
                        (available on the Compass Schoolhouse website) which includes the following documents.
                        <ul class="font-weight-bold">
                            <li>The Information to Parents Statement</li>
                            <li>Compass Schoolhouse Philosophy of Discipline</li>
                            <li>Compass Schoolhouse Release of Children Policy</li>
                            <li>Compass Schoolhouse Policy on the Expulsion of Children</li>
                        </ul>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label pt-0">CHECK HERE</label>
                    <div class="col-lg-8 col-sm-10">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="release_form" value="1" required/>
                        </div>
                    </div>
                </div>

                <h4 class="card-title mt-5">PHOTO</h4>

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        Compass Schoolhouse takes photos and videos at various events for its daily class emails, website, social media,
                        and printed promotional purposes. Compass Schoolhouse policy states that we will not identify children by name
                        or address in any photographs, videos, or publications unless written permission is obtained from parents.
                    </div>
                </div>

                <fieldset class="form-group mt-3">
                    <div class="row">
                        <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Please choose <b>ONE OPTION ONLY</b></legend>
                        <div class="col-lg-8 col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="photo_choice" id="photoHigh"
                                       value="My child's photo may appear in daily class emails,
                                       on the website, social media (i.e. Facebook, Instagram), and printed promotional
                                       purposes">
                                <label class="form-check-label" for="photoHigh" id="photoHighLabel">
                                    My child's photo may appear in daily class emails,
                                    on the website, social media (i.e. Facebook, Instagram), and printed promotional
                                    purposes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="photo_choice" id="photoMedium"
                                       value="My child's photo may appear in daily class emails ONLY">
                                <label class="form-check-label" for="photoMedium" id="photoMediumLabel">
                                    My child's photo may appear in daily class emails ONLY
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="photo_choice" id="photoLow" checked
                                       value="Do not include my child in any photographs">
                                <label class="form-check-label" for="photoLow" id="photoLowLabel">
                                    Do not include my child in any photographs
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h4 class="card-title mt-5">DIRECTORY</h4>

                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        The Compass Schoolhouse DIRECTORY of all Compass Schoolhouse students will be available on the
                        Compass Schoolhouse website for the convenience of our families. THE DIRECTORY IS PASSWORD
                        PROTECTED. Do you give your permission for your child's name, address, phone numbers, and your
                        email address to appear in the password protected Compass Schoolhouse Directory.
                    </div>
                </div>

                <fieldset class="form-group mt-3">
                    <div class="row">
                        <legend class="col-form-label col-lg-4 col-sm-2 pt-0">Please choose <b>ONE OPTION ONLY</b></legend>
                        <div class="col-lg-8 col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="directory" id="directoryAgree" value="1">
                                <label class="form-check-label" for="directoryAgree">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="directory" id="directoryDisagree" value="0"
                                       checked>
                                <label class="form-check-label" for="directoryDisagree">No</label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label"><b>Your name</b></label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="text" class="form-control {{$errors->has('your_name')? "is-invalid": ""}}" id="your_name"
                               placeholder="Your Name" name="your_name" autocomplete="off"
                               minlength="3" maxlength="255" required>
                        @if ($errors->has('your_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('your_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label"><b>Date</b></label>
                    <div class="col-lg-8 col-sm-10">
                        <input type="date" class="form-control {{$errors->has('date')? "is-invalid": ""}}" id="date"
                               placeholder="Date" name="date" autocomplete="off" required>
                        @if ($errors->has('date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-sm-2 col-form-label"><b>Signature</b></label>
                    <div class="col-lg-8 col-sm-10">
                        <canvas id="canvas" class="border sign"></canvas>
                        <input id="signature" class="d-none" name="signature" />
                    </div>
                    <label class="col-lg-4 col-sm-2 col-form-label mt-2"></label>
                    <div class="col-lg-8 col-sm-10 mt-2">
                        <button id="clear" class="btn btn-danger">Clear</button>
                    </div>
                </div>

                <div class="form-group row mt-5">
                    <label class="col-lg-4 col-sm-2 col-form-label"></label>
                    <div class="col-lg-8 col-sm-10 g-recaptcha" data-sitekey="{{env('CAPTCHA_SITEKEY')}}" ></div>
                </div>

                <div class="form-group row">
                    <div class="offset-lg-4 offset-sm-2 col-lg-8 col-sm-10">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection