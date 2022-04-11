<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){

    }


    public function show(){

    }


    public function changeStatus(){

    }

    public function craeteRole()
    {
        $role = Role::create(['name' => 'admin']);
        $user = User::first();
        $user->assignRole('admin');
        return 'success';
    }

}
