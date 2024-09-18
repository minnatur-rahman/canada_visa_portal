<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\VisaInfo;
use App\Models\VisaPdf;
use Exception;
use Illuminate\Http\Request;

class VisaFileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(
            [
                'file' => 'required|mimes:pdf,jpg,jpeg,png',
                'type' => 'required|string|max:255'
            ],
            [
                'file.required' => 'File is required',
                'type' => 'File type is required'
            ]
        );

        $visa = VisaInfo::findOrfail($request->id);

        if ($request->hasFile('file')) {
            $extension = $request->file->getClientOriginalExtension();
            $file_name =  uniqid() . '.' . $extension;
            $request->file->move('uploads/', $file_name);
        }

        try{
            VisaPdf::create([
                'visa_info_id' => $request->id,
                'name' => $file_name,
                'type' => $request->type
            ]);
            return back()->with('success', 'Document has added!');
        }catch(Exception $e){
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function delete($id)
    {
        
    }
}
