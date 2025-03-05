<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $employers = User::where('is_admin', false)->where('user_type','employer')->get();
        return view('admin.admin_manageEmploy',compact('employers'));
    }
}
