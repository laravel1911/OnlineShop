<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function listOfUsers()
    {
        $users = User::get();
        return view('admin.user.index', ['users' => $users]);
    }

    public function edit($id);{
        
    }
}
