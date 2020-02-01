<?php

namespace App\Http\Controllers;

use App\Bmw;
use App\Model\Clients;
use Illuminate\Http\Request;

class TicketController extends Controller
{

  public function val()
  {
    return view('pages.val');
  }
  public function shuffle(){
    return Clients::shuffle();
  }

  public function won(Request $reuest){
    return ['status' => Clients::winner($reuest->key)];
  }

  public function lucks(){
    return Clients::lucks();
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('welcome');
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
     * @param  \App\Bmw  $Bmw
     * @return \Illuminate\Http\Response
     */
    public function show(Bmw $Bmw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bmw  $Bmw
     * @return \Illuminate\Http\Response
     */
    public function edit(Bmw $Bmw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bmw  $Bmw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bmw $Bmw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bmw  $Bmw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bmw $Bmw)
    {
        //
    }
}
