<?php

namespace App\Http\Controllers;

use App\Models\Taxi;
use Illuminate\Http\Request;

class TaxiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxi = Taxi::paginate(30);
        return view('taxi.index', compact('taxis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taxi = new Taxi();
        return view('taxi.create_edit', compact('taxi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taxi = Taxi::create($request->all());
        return redirect()->route('taxi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function show(Taxi $taxi)
    {
        return view('taxi.show', compact('taxi'));
        return redirect()->route('taxi.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function edit(Taxi $taxi)
    {
        return view('taxi.create_edit', compact('taxi'));
        return redirect()->route('taxi.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taxi $taxi)
    {
        $taxi->update($request->all());
        return redirect()->route('taxi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taxi  $taxi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taxi $taxi)
    {
        $taxi->delete();
        return redirect()->route('taxi.index');
    }
}
