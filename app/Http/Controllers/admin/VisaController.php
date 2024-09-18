<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\VisaInfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VisaController extends Controller
{
    public function index()
    {
        $visas = VisaInfo::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.visa.index', compact('visas'));
    }

    public function view($id)
    {
        $visa = VisaInfo::findOrFail($id);
        return view('admin.visa.view', compact('visa'));
    }

    public function create()
    {
        return view('admin.visa.create');
    }

    public function edit($id)
    {
        $visa = VisaInfo::findOrFail($id);
        return view('admin.visa.edit', compact('visa'));
    }

    public function delete($id)
    {
        $visa = VisaInfo::findOrFail($id);
        foreach($visa->pdfs as $pdf){
            $pdf->delete();
        }
        
        $imagePath = public_path('uploads/' . $visa->image);
        if (File::exists($imagePath)) {
            unlink($imagePath);
        }

        try{
            $visa->delete();
            return back()->with('success', 'Visa information has deleted!');
        }catch(Exception $e){
            return back()->with('error', 'not deleted');
        }
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'status' => 'required|string|max:255',
                'image' => 'required|',
                'surname' => 'required|string|max:255',
                'given_name' => 'required|string|max:255',
                'sex' => 'required|string|max:255',
                'birth_city' => 'required|string|max:255',
                'current_nationality' => 'required|string|max:255',
                'dob' => 'required|string|date_format:Y-m-d',
                'body_mark' => 'required|string|max:255',
                'nid' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'job_title' => 'required|string|max:255',
                'duty_duration' => 'required|string|max:255',
                'salary' => 'required|string|max:255',
                'passport_number' => 'required|string|max:255',
                'issued_country' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'note' => 'string|nullable|max:255',
            ],
            [
                'status.required' => 'Status is required',
                'image.required' => 'Image is required',
                'surname.required' => 'Surname is required',
                'given_name.required' => 'Given name is required',
                'sex.required' => 'Gender / Sex is required',
                'birth_city.required' => 'Birth City / Town is required',
                'current_nationality.required' => 'Current City is required',
                'dob.required' => 'Date of birth is required',
                'body_mark.required' => 'Body mark is required',
                'nid.required' => 'National ID number is required',
                'company_name.required' => 'Company name is required',
                'job_title.required' => 'Job title is required',
                'duty_duration.required' => 'Duty duration is required',
                'salary.required' => 'Salary amount is required',
                'passport_number.required' => 'Passport number is required',
                'issued_country.required' => 'Issued country is required',
                'phone.required' => 'Phone number is required',
                'email.required' => 'Email address is required',
            ]
        );

        if ($request->hasFile('image')) {
            $extension = $request->image->getClientOriginalExtension();
            $imageName =  uniqid() . '.' . $extension;
            $request->image->move('uploads/', $imageName);
        }

        try{
            $visa = VisaInfo::create([
                'status' => $request->status,
                'image' => $imageName,
                'surname' => $request->surname,
                'given_name' => $request->given_name,
                'sex' => $request->sex,
                'birth_city' => $request->birth_city,
                'current_nationality' => $request->current_nationality,
                'dob' => $request->dob,
                'body_mark' => $request->body_mark,
                'nid' => $request->nid,
                'company_name' => $request->company_name,
                'job_title' => $request->job_title,
                'duty_duration' => $request->duty_duration,
                'salary' => $request->salary,
                'passport_number' => $request->passport_number,
                'issued_country' => $request->issued_country,
                'phone' => $request->phone,
                'email' => $request->email,
                'note' => $request->note
            ]);
            return redirect()->route('admin.visa.view', $visa->id)->with('success', 'Visa Information Saved');
        }catch(Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'id' => 'required|integer|required',
                'status' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg',
                'surname' => 'required|string|max:255',
                'given_name' => 'required|string|max:255',
                'sex' => 'required|string|max:255',
                'birth_city' => 'required|string|max:255',
                'current_nationality' => 'required|string|max:255',
                'dob' => 'required|string|date_format:Y-m-d',
                'body_mark' => 'required|string|max:255',
                'nid' => 'required|string|max:255',
                'company_name' => 'required|string|max:255',
                'job_title' => 'required|string|max:255',
                'duty_duration' => 'required|string|max:255',
                'salary' => 'required|string|max:255',
                'passport_number' => 'required|string|max:255',
                'issued_country' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'note' => 'string|nullable|max:255',
            ],
            [
                'id.required' => 'ID is required',
                'status.required' => 'Status is required',
                'surname.required' => 'Surname is required',
                'given_name.required' => 'Given name is required',
                'sex.required' => 'Gender / Sex is required',
                'birth_city.required' => 'Birth City / Town is required',
                'current_nationality.required' => 'Current City is required',
                'dob.required' => 'Date of birth is required',
                'body_mark.required' => 'Body mark is required',
                'nid.required' => 'National ID number is required',
                'company_name.required' => 'Company name is required',
                'job_title.required' => 'Job title is required',
                'duty_duration.required' => 'Duty duration is required',
                'salary.required' => 'Salary amount is required',
                'passport_number.required' => 'Passport number is required',
                'issued_country.required' => 'Issued country is required',
                'phone.required' => 'Phone number is required',
                'email.required' => 'Email address is required',
            ]
        );

        $visa = VisaInfo::findOrFail($request->id);

        
        $image_file_name = $visa->image;
        if ($request->hasFile('image')) {
            // REMOVE OLD IMAGE
            $imagePath = public_path('uploads/' . $visa->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }

            // UPLOAD NEW IMAGE
            $extension = $request->image->getClientOriginalExtension();
            $imageName =  uniqid() . '.' . $extension;
            $request->image->move('uploads/', $imageName);
            $image_file_name = $imageName;
        }

        $payload = [
            'status' => $request->status,
            'image' => $image_file_name,
            'surname' => $request->surname,
            'given_name' => $request->given_name,
            'sex' => $request->sex,
            'birth_city' => $request->birth_city,
            'current_nationality' => $request->current_nationality,
            'dob' => $request->dob,
            'body_mark' => $request->body_mark,
            'nid' => $request->nid,
            'company_name' => $request->company_name,
            'job_title' => $request->job_title,
            'duty_duration' => $request->duty_duration,
            'salary' => $request->salary,
            'passport_number' => $request->passport_number,
            'issued_country' => $request->issued_country,
            'phone' => $request->phone,
            'email' => $request->email,
            'note' => $request->note
        ];

        try{
            VisaInfo::where('id', $request->id)->update($payload);
            return redirect()->route('admin.visa.view', $request->id)->with('success', 'Information has updated!');
        }catch(Exception $e){
            dd($e);
            return back()->with('error', 'Something went wrong, please try again!');
        }
    }
}
