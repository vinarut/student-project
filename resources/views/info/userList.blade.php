@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Users</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <form method="post" action="{{route('admin.removeUser')}}" class="text-center">
                                        @method('delete')
                                        @csrf
                                        <input class="d-none" name="email" value="{{$user->email}}">
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection