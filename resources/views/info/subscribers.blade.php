@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Token</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subscribers as $subscriber)
                            <tr>
                                <th scope="row" class="align-middle">{{$subscriber->id}}</th>
                                <td class="align-middle">{{$subscriber->name}}</td>
                                <td class="align-middle">{{$subscriber->surname}}</td>
                                <td class="align-middle">{{$subscriber->token}}</td>
                                <td class="text-center"><button class="btn btn-link" data-clipboard-action="copy"
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
    </div>
@endsection