<?php

namespace App\Http\Controllers;

use App\Models\DestinationType;
use Illuminate\Http\Request;

class DestinationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destTypes = DestinationType::all();

        return view('dashboard.destType.index', compact('destTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.destType.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:destination_types',
        ]);

        DestinationType::create([
            'name' => ucwords($request->name),
        ]);

        return redirect()->route('admin.destination_type.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DestinationType  $destinationType
     * @return \Illuminate\Http\Response
     */
    public function show(DestinationType $destinationType)
    {
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DestinationType  $destinationType
     * @return \Illuminate\Http\Response
     */
    public function edit(DestinationType $destinationType)
    {
        $destType = $destinationType;

        return view('dashboard.destType.edit', compact('destType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DestinationType  $destinationType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DestinationType $destinationType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $destinationType->name = ucwords($request->name);
        $destinationType->save();

        return redirect()->route('admin.destination_type.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DestinationType  $destinationType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestinationType $destinationType)
    {
        $destinationType->delete();

        return redirect()->route('admin.destination_type.index')->with('success', 'Data berhasil dihapus');
    }
}
