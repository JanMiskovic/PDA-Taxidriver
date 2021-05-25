<?php

namespace App\Http\Controllers;

use App\Models\Drive;
use App\Models\Driver;
use App\Models\Shift;
use Illuminate\Http\Request;

class DriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drives = Drive::paginate(30);
        return view('drive.index', compact('drives') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drive = new Drive();
        $shifts = Shift::all();

        return view('drive.create_edit', compact('shifts', 'drive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drives = Drive::create($request->all());
        return redirect()->route('drive.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function show(Drive $drive)
    {
        return view('drive.show', compact('drive'));
        return redirect()->route('drive.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function edit(Drive $drive)
    {
        $shifts = Shift::all();

        return view('drive.create_edit', compact('shifts', 'drive'));
        return redirect()->route('drive.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drive $drive)
    {
        $drive->update($request->all());
        return redirect()->route('drive.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drive  $drive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drive $drive)
    {
        $drive->delete();
        return redirect()->route('drive.index');
    }
}
