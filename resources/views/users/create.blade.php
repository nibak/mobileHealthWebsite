@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
                <h2>Add New User</h2>
                <hr>

            <div class="form-content">
                <form method="POST" action="/users">
                    @csrf

                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               name="name" value="{{ @old('name') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ @old('email') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password" value="">
                    </div>
                    <div class="col-md-6">
                        <label for="isAdmin">Administrator (0=No, 1=Yes)</label>
                        <input type="text" class="form-control @error('isAdmin') is-invalid @enderror"
                               id="isAdmin" name="isAdmin" value="{{ @old('isAdmin') }}">
                    </div>
                    <div class="form-button mt-3">
                        <input class="btn btn-primary" type="submit" value="Save">
                        <a class="btn btn-warning mx-1" href="/users">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


