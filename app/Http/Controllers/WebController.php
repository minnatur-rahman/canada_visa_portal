<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function visa_enquiry()
    {
        return view('visa-enquiry');
    }

    public function visa_enquiry_post(Request $request)
    {
        $request->validate(
            [
                'passport' => 'required|string|max:255',
                'nationality' => 'required|string|max:255',
                'birth_date' => 'required|date|before:2005-01-01'
            ],
            [
                'passport.required' => 'Passport number is required',
                'nationality.required' => 'Nationality is required',
                'birth_date.required' => 'Date of birth is required'
            ]
        );

        return view('visa-enquiry');
    }
}
