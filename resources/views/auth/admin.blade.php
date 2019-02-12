@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @include('flash::message')
                <h4 class="card-title">Register</h4>
                <form method="post" action="{{route('admin.register')}}" id="adminForm">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-4 col-sm-2 col-form-label">Name</label>
                        <div class="col-lg-8 col-sm-10">
                            <input type="text" placeholder="Name" name="name" autocomplete="off"
                                   minlength="3" maxlength="255" required
                                   class="form-control {{$errors->has('name')? "is-invalid": ""}}" id="name">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-sm-2 col-form-label">Surname</label>
                        <div class="col-lg-8 col-sm-10">
                            <input type="text" placeholder="Surname" name="surname" autocomplete="off"
                                   minlength="3" maxlength="255" required
                                   class="form-control {{$errors->has('surname')? "is-invalid": ""}}" id="surname">
                            @if ($errors->has('surname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('surname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-4 col-sm-2 col-form-label">Token</label>
                        <div class="col-lg-8 col-sm-10">
                            <input type="button" class="btn btn-link mb-2 pl-lg-0" value="Generate token" id="btnGenerate">
                            <textarea type="text" name="token" id="token" required readonly
                                      class="form-control d-none {{$errors->has('token')? "is-invalid": ""}}" ></textarea>
                            @if ($errors->has('token'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('token') }}</strong>
                                </span>
                            @endif

                        </div>
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