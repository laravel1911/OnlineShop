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
        $role = Role::create(['name' => 'seller']);
        $user = User::first();
        $user->assignRole($role);
         $roles = $user->getRoleNames();
         $user->removeRole('admin');
         if($user->hasRole('admin'))
             return 'bor';

        $users = User::role('writer')->get(); // Returns only users with the role 'writer'

        return 'success';
    }

}
