<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $owner_info = $request->owner_info;

        session(['owner_info' => $owner_info]);

        $owners = DB::table('users')
        ->join('rooms', 'user_id', 'own_id_foreign') 
        ->where('role','owner')
        ->where('name', 'LIKE', "%$owner_info%")
        ->orderBy('name')
        ->get();
        
        return view('admin.show-owners', compact('owners'));
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
    public function show($user_id)
    {
        $user = User::findOrFail($user_id);

        return view('owners.show-user', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);

        return view('owners.edit-owner', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->save();

        return redirect('/users/'.$user_id)->with('success', 'Account Information has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
