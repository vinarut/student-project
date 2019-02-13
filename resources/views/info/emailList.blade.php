@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">E-mail`s</h4>
                <form method="post" action="{{route('admin.emails.post')}}" id="emailForm">
                    @csrf
                    <div class="form-group row">
                        <div class="col-lg-2 col-sm-2">
                            <button type="submit" class="btn btn-primary" id="btnAdd">Add</button>
                        </div>
                        <div class="col-lg-10 col-sm-10">
                            <input type="email" placeholder="E-mail" name="email" autocomplete="off" required
                                   class="form-control {{$errors->has('email')? "is-invalid": ""}}" id="email">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </form>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">E-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($emails as $email)
                        <tr>
                            <th scope="row">{{$email->id}}</th>
                            <td>{{$email->email}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection