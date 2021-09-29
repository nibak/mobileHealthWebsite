<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Coursedate;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*        dd($bookings);*/
        $bookings = Booking::all();
        $coursedates = Coursedate::all();
        $courses = Course::all();

        return view('bookings.index', ['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*        dd($request);*/

        request()->validate([
            /*'coursedate_id' = 'required';*/
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'company_name' => '',
            'add_street' => '',
            'add_suburb' => '',
            'add_city' => '',
            'add_postcode' => '',
            'add_country' => '',
            'course_name' => 'required',
            'course_date' => 'required',
            'course_total' => 'required',
            'is_terms_agreed' => 'required',
        ]);

        $booking = new booking();
        $booking->coursedate_id = 100;
        $booking->first_name = request('first_name');
        $booking->last_name = request('last_name');
        $booking->email = request('email');
        $booking->phone = request('phone');
        $booking->dob = request('dob');
        $booking->gender = request('gender');
        $booking->company_name = request('company_name');
        $booking->add_street = request('add_street');
        $booking->add_suburb = request('add_suburb');
        $booking->add_city = request('add_city');
        $booking->add_postcode = request('add_postcode');
        $booking->add_country = request('add_country');
        $booking->course_name = request('course_name');
        $booking->course_date = request('course_date');
        $booking->course_total = request('course_total');
        $booking->is_terms_agreed = request('is_terms_agreed');

        $booking->save();

        return redirect('bookings');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', ['booking' => $booking]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit', ['booking' => $booking]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'company_name' => '',
            'add_street' => '',
            'add_suburb' => '',
            'add_city' => '',
            'add_postcode' => '',
            'add_country' => '',
            'course_name' => '',
            'course_date' => '',
            'course_total' => '',
            'is_terms_agreed' => 'required',
        ]);

        $booking->update($request->all());
        return redirect('bookings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect('bookings');
    }
}
