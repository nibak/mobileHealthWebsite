courses.index.blade

@extends('layouts.app')
@section('content')

    <div class="container">

        <a class="btn btn-primary mx-1" href="/courses/index">View Courses</a>
        <a class="btn btn-primary mx-1 " href="/coursedates/index">View Course Dates</a>
        <a class="btn btn-primary mx-1 " href="/books/index">View Bookings</a>

        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>View Courses</h2>
                    <hr>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">courseName</th>
                        <th scope="col">courseDescLong</th>
                        <th scope="col">courseDescShort</th>
                        <th scope="col">startTime</th>
                        <th scope="col">endTime</th>
                        <th scope="col">price</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $c)
                        <tr>
                            <th scope="row">{{$c->id}}</th>
                            <td>{{$c->courseName}} </td>
                            <td>{{$c->courseDescLong}}</td>
                            <td>{{$c->courseDescShort}}</td>
                            <td>{{$c->startTime}}</td>
                            <td>{{$c->endTime}}</td>
                            <td>{{$c->price}}</td>

                            <td>
                                <form action="/courses" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    @auth
                                        <a class="btn btn-primary mx-1"
                                           href="/courses/show/">Show</a>
                                        <a class="btn btn-success mx-1" href="/courses/edit">Edit</a>
                                        <button type="submit" title="delete" class="btn btn-danger mx-1">Delete</button>
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
