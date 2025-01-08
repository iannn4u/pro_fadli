<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "User Management";
        $data["users"] = User::where('id_user', "!=", auth()->user()->id_user)->get();

        return view("user.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data["title"] = "Tambah User";

        return view("user.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|unique:users,name",
            "username" => "required|unique:users,username",
            "role" => "required",
            "password" => "required",
        ]);

        User::create($validated);

        return redirect('/user')->with("alert", "Berhasil tambah data user.");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data["title"] = "Edit User";
        $data["user"] = $user;

        return view("user.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'password' => 'nullable',
        ]);

        if ($request->input('password') == null) {
            $validated['password'] = $user->password;
        } else {
            $validated['password'] = Hash::make($request->input("password"));
        }

        $user->update($validated);

        return redirect('/user')->with('alert', 'Berhasil edit data user.');
    }

    public function updateSetting(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'password' => 'nullable',
        ]);

        if ($request->input('password') == null) {
            $validated['password'] = $user->password;
        } else {
            $validated['password'] = Hash::make($request->input("password"));
        }

        $user->update($validated);

        return back()->with('alert', 'Berhasil edit data user.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect("/user")->with("alert", "Berhasil hapus data user");
    }

    public function setting(User $user)
    {
        $data['title'] = 'Setting';

        return view('user.setting', $data);
    }
}
