<?php

namespace App\Http\Controllers;

use App\Models\ejemplo;
use Illuminate\Http\Request;

class EjemploController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //al activarlo, que imprima en pantalla 
        print("se ha activado la url get 'ejemplo' cuyo nombre es 'ejemplo.index'");
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
     * @param  \App\Models\ejemplo  $ejemplo
     * @return \Illuminate\Http\Response
     */
    public function show(ejemplo $ejemplo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ejemplo  $ejemplo
     * @return \Illuminate\Http\Response
     */
    public function edit(ejemplo $ejemplo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ejemplo  $ejemplo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ejemplo $ejemplo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ejemplo  $ejemplo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ejemplo $ejemplo)
    {
        //
    }
}
