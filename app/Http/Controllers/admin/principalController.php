<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;

class principalController extends Controller
{
    public function index()
    {
        // $users = user::all();

        return view('admin.principal');
    }
}
