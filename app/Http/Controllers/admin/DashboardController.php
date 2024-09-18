<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\VisaInfo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total = VisaInfo::count();
        $approved = VisaInfo::where('status', 'approved')->count();
        $pending = VisaInfo::where('status', 'pending')->count();
        $declined = VisaInfo::where('status', 'declined')->count();
        return view('admin.dashboard', compact('total', 'approved', 'pending', 'declined'));
    }
}
