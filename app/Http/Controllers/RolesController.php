<?php

namespace App\Http\Controllers;


use App\User;
use App\Roles;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RolesStoreRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
        $roles = \App\Roles::all();
        return view("roles.index",compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesStoreRequest $request)
    {
        abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
        Roles::create([
            'title' => request('title'),
            'description' => request('description')

        ]);
        $Permission = new \App\Permission;
        $Permission->roles_id = Roles::latest()->first()->id;
        $Permission->save();
        return redirect('/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
        $roles= Roles::findOrFail($id);
        return view('roles.show',compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
        $roles= Roles::findOrFail($id);
        return view('roles.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update($id,RolesStoreRequest $request)
    {
        abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
        $roles= Roles::findOrFail($id);
        $roles->update(request(['title','description']));
        $roles->save();
        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Auth::user()->roles->permissions->manageUser!==1,403);
        $roles= Roles::findOrFail($id);
        $roles->delete();
        return redirect('/roles');
    }
}
