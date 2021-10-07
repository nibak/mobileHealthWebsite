@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="section-heading">
                <h2>Users</h2>
                <hr>
            </div>

            <p>
                @can('isAdmin')
                    <a class="btn btn-outline-primary mx-1 "
                       href="/users/create">Register new user</a>
                @endcan
            </p>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Administrator</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <th>{{$user->name}}</th>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->isAdmin == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                <form action="/users/{{$user->id}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    @auth
                                        <a class="btn btn-outline-success mx-1"
                                           href="/users/{{$user->id}}/edit">Edit</a>
                                        @can('isAdmin')
                                            @if(Auth::user() == $user)
                                            @else
                                                <button type="submit" title="delete"
                                                        class="btn btn-outline-secondary mx-1">
                                                    Delete
                                                </button>
                                            @endif
                                        @endcan
                                    @endauth
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

