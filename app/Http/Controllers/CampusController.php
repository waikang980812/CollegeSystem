<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function edit(Campus $campus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
            $campus1 = Campus::findOrFail($id);
             $campus1->kl = False;
            $campus1->johor=False;
            $campus1->perak=False;
            $campus1->pahang=False;
            $campus1->sabah=False;
            $campus1->penang=False;
        $campus_checkbox = Request()->input('campus_checkbox');
        if(!is_null($campus_checkbox)){
           foreach ($campus_checkbox as $campus){
              if($campus == 'kl'){
                  $campus1->kl = True;
              }elseif ($campus == 'johor') {
                $campus1->johor=True;
              }elseif ($campus == 'perak') {
                $campus1->perak=True;
              }elseif ($campus == 'pahang') {
                $campus1->pahang=True;
              }elseif ($campus == 'sabah') {
                $campus1->sabah=True;
              }
              else
                $campus1->penang=True;
              }
            
        }
        $campus1->update([
            'kl' => $campus1->kl,
            'johor'=>$campus1->johor,
            'perak'=>$campus1->perak,
            'pahang'=>$campus1->pahang,
            'sabah'=>$campus1->sabah,
            'penang'=>$campus1->penang,
        ]);
        return back();
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campus  $campus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campus $campus)
    {
        //
    }
}
