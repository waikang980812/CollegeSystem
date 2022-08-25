<?php

namespace App\Http\Controllers;

use App\ProgrammeStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgrammeStructureController extends Controller
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
        abort_if(Auth::user()->roles->permissions->manageProg!==1,403);
         $request->validate([
            'subject' => 'required|max:255',
        ]);
            ProgrammeStructure::create([
            'subject' => request('subject'),
            'programme_id' =>request('programmes_id')
           ]);
          return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProgrammeStructure  $programmeStructure
     * @return \Illuminate\Http\Response
     */
    public function show(ProgrammeStructure $programmeStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProgrammeStructure  $programmeStructure
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgrammeStructure $programmeStructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProgrammeStructure  $programmeStructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgrammeStructure $programmeStructure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProgrammeStructure  $programmeStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
    public function delete($id)
    {
        abort_if(Auth::user()->roles->permissions->manageProg!==1,403);
      $structure= ProgrammeStructure::findOrFail($id);
        $structure->delete();
    return redirect()->back();
    }
}
