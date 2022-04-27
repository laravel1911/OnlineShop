<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $users = User::where('id', '=', $id )->first();
        $role = Role::with('user')->where('users_id', auth()->id())->get();
        return view('admin.user.show', ['users' => $users, 'role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('id', '=', $id )->first();
        $role = Role::with('user')->where('users_id', auth()->id())->get();
        return view('admin.user.edit', ['users' => $users, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required',
            'login' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $users = User::where('id', '=', $id )->first();
        $users->name = $request->name;
        $users->login = $request->login;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->image = $request->image;
        //dd($request);
        $users->save();

        return redirect()->route('admin.users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        $users = User::where('id', '=', $id )->first();
        $users -> delete();
    }
}
