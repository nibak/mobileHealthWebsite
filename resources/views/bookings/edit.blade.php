@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="section-heading">
                <h2>Edit booking</h2>
                <hr>
            </div>


            <div class="form-content">
                <form method="POST" action="/bookings/{{$booking->id}}">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        <h4>Course Details</h4>
                        <p>{{$booking->course_name}}</p>

                        <div class="col-md-12">
                            <label for="course_id">Course</label>
                            <select id="course_id" name="course_id" class="form-control"
                                    @error('course_id') is-invalid @enderror required onchange="this.form.submit()">
                                @foreach ($courses as $course)
                                    <option
                                        {{ $courses->id == $old_id ? 'selected' : '' }}  value="{{$courses->id}}">{{$courses->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="coursedate_id" class="form-control-label">Select course date*</label>
                            <select name="coursedate_id" id="coursedate_id"
                                    class="form-control @error('coursedate_id') is-invalid @enderror"
                                    value="{{$course->scheduled_date}}"
                                    required>
                                @foreach ($coursedates as $coursedate)
                                    <option value="{{$coursedate->id}}">
                                        {{$coursedate->scheduled_date->format('l d-M-Y')}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{--

                        <div class="col-md-12">
                            <label for="course_name">Course</label>
                            <select id="course_name" name="course_name" class="form-control"
                                    @error('course_total') is-invalid @enderror required>
                                <option value="FirstAid">First Aid Course</option>
                                <option value="FirstAidRefresh">First Aid Refresher</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="course_date" class="form-control-label">Select course date*</label>
                            <select name="course_date" id="course_date"
                                    class="form-control @error('course_total') is-invalid @enderror"
                                    required>
                                <option value="2022-02-05">Thursday 05 Feb 2022</option>
                                <option value="2022-02-17">Thursday 17 Feb 2022</option>
                            </select>
                        </div>
                    </div>--}}
                    <div class="col-md-6">
                        <label for="course_total">Course Total</label>
                        <input type="number" class="form-control @error('course_total') is-invalid @enderror"
                               name="course_total" id="course_total" value="{{$booking->course_total}}" required>
                    </div>
                    <h4>Attendee Details</h4>

                    <div class="form-group col-12">
                        <label for="id">ID</label>
                        <input type="text" class="form-control @error('id') is-invalid @enderror" id="id"
                               name="id" value="{{$booking->id}}" readonly>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="first_name">First Name *</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                   name="first_name" id="first_name" value="{{$booking->first_name}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">Last Name *</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                   id="last_name" name="last_name" value="{{$booking->last_name}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email*</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   value="{{$booking->email}}" required/>
                        </div>

                        <div class="col-md-6">
                            <label for="phone">Phone number (mobile preferred)*</label>
                            <input class="form-control" type="text" name="phone" value="{{$booking->phone}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="actName" class="form-control-label">Date of birth*</label>
                            <input class="form-control"
                                   type="date" id="dob" name="dob"
                                   min="1920-01-01" max="2021-01-01"
                                   pattern="\d{2}-\d{2}-\d{4}"
                                   value="{{$booking->dob}}"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="gender" class="form-control-label">Gender*</label>
                            <select name="gender" id="gender" class="form-control"
                                    value="{{$booking->gender}}" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="company_name">Company Name *</label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                   name="company_name" id="company_name" value="{{$booking->company_name}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="street">Street Address</label>
                            <input type="text" class="form-control @error('street') is-invalid @enderror"
                                   name="street" id="street" value="{{$booking->street}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="suburb">Suburb</label>
                            <input type="text" class="form-control @error('suburb') is-invalid @enderror"
                                   name="suburb" id="suburb" value="{{$booking->suburb}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                   name="city" id="city" value="{{$booking->city}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="postcode">Postcode</label>
                            <input type="text" class="form-control @error('postcode') is-invalid @enderror"
                                   name="postcode" id="postcode" value="{{$booking->postcode}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="country">Country</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror"
                                   name="country" id="country" value="{{$booking->country}}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="isActive">Active Record (0=No, 1=Yes)</label>
                            <input type="text" class="form-control @error('isActive') is-invalid @enderror"
                                   id="isActive" name="isActive" value="{{$booking->is_Active}}">
                        </div>

                        <div class="form-button mt-3">
                            <input class="btn btn-primary" type="submit" value="Save">
                            <a class="btn btn-warning" href="/bookings/">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection


