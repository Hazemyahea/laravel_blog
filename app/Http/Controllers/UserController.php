<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
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
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $roles =  Role::get();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input= $request->all();
        if($file = $request->file('photo')){
            $file_name = time().$file->getClientOriginalName();
            $file->move('images',$file_name);
            $input['photo'] = $file_name;
        }
        $input['password'] = bcrypt($request->password);
        User::create($input);
        return redirect()->back()->with(['success'=>'the user added Succesfuly']);





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        if ($photo = $request->file('photo')){
            $photo_name = time() . $photo->getClientOriginalName();
            $photo->move('images',$photo_name);
            $input['photo'] = $photo_name;
        }
        $input['password'] = bcrypt($request->password);
        $user->update($input);
        return redirect()->back()->with(['success'=>'The User Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->photo){
            unlink(public_path('images/') . $user->photo);
        }

        $user->delete();
        return redirect()->back()->with(['delete'=>'The User deleted Successfully']);
    }
}
