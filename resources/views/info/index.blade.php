@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-2 mb-2">
            <a href="{{ route('info.export', request()->query()) }}"><img src="/img/csv.svg" style="width: 50px;"></a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">DOB</th>
                <th scope="col">Street</th>
                <th scope="col">Town</th>
                <th scope="col">ZIP</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td><a href="{{route('info.show', ['info' => $client->id])}}">{{$client->childs_name}}</a></td>
                    <td>{{$client->DOB}}</td>
                    <td>{{$client->street_address}}</td>
                    <td>{{$client->town}}</td>
                    <td>{{$client->zip}}</td>
                    <td>{{$client->primary_email_address}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection