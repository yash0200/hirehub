<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function changePassword()
    {
        return view('admin.admin_changePassword');
    }
}
