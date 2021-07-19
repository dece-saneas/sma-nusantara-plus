<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gelombang;

class GelombangController extends Controller
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
        return view('pages.gelombang-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'period' => 'required',
            'qty' => 'required',
            'fee' => 'required',
        ]);
        
        $period = (explode(" s/d ",$request->period));
        
        $gelombang = Gelombang::create([
            'name' =>  $request['name'],
            'start_period' =>  date("Y-m-d", strtotime($period[0])).' 00:00:00',
            'end_period' =>  date("Y-m-d", strtotime($period[1])).' 23:59:59',
            'total_quota' =>  $request['qty'],
            'remaining_quota' =>  $request['qty'],
            'fee' =>  $request['fee'],
        ]);
     
        session()->flash('success', 'Gelombang berhasil di buat !');
        
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function show(Gelombang $gelombang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gelombang $gelombang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gelombang $gelombang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gelombang  $gelombang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gelombang $gelombang)
    {
        //
    }
}
