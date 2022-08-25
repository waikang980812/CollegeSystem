<?php

namespace App\Http\Controllers;

use App\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProgrammeStoreRequest;
use App\Http\Requests\ProgrammeUpdateRequest;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        abort_if(Auth::user()->roles->permissions->manageProg!==1,403);
        return view('programme.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgrammeStoreRequest $request)
    {
        abort_if(Auth::user()->roles->permissions->manageProg!==1,403);
         Programme::create([
            'name' => request('name'),
            'description' => request('description'),
            'faculty_id' => request('faculties_id'),
            'mer' => request('mer'),
            'courseinfo'=>request('courseinfo'),
            'duration'=>request('duration'),


        ]);
         $campus = new \App\Campus;
         $programme = \App\Programme::latest()->first();
         $campus->programme_id = $programme->id;
         $campus->save();
         $faculty = \App\Faculty::findOrFail($request->faculties_id);
         return view('faculty.show',compact('faculty'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Auth::user()->roles->permissions->manageProg!==1,403);
        $programme = \App\Programme::findOrFail($id);
        return view('programme.show',compact('programme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Auth::user()->roles->permissions->manageProg!==1,403);
        $programme = \App\Programme::findOrFail($id);
        return view('programme.edit',compact('programme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update($id,ProgrammeUpdateRequest $request)
    {
        abort_if(Auth::user()->roles->permissions->manageProg!==1,403);
        $programme = \App\Programme::findOrFail($id);
        $programme->name = $request->name;
        $programme->description = $request->description;
        $programme->mer = $request->mer;
        $programme->courseinfo = $request->courseinfo;
        $programme->duration = $request->duration;
        $programme->update();
        return view('programme.show',compact('programme'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Auth::user()->roles->permissions->manageProg!==1,403);
        $programme = \App\Programme::findOrFail($id);
        $programme->delete();
        return redirect('/faculty');
    }
}
