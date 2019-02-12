@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Token</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscribers as $subscriber)
                        <tr>
                            <th scope="row">{{$subscriber->id}}</th>
                            <td>{{$subscriber->name}}</td>
                            <td>{{$subscriber->surname}}</td>
                            <td>{{$subscriber->token}}</td>
                            <td><button class="btn btn-link" data-clipboard-action="copy"
                                        data-clipboard-text="{{route('register.create',
                                        ['token' => $subscriber->token])}}">
                                    Copy URL to clipboard</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection