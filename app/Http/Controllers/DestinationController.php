<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationImage;
use App\Models\DestinationType;
use Illuminate\Http\Request;

class DestinationController extends Controller
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
        $types = DestinationType::all();
        return view('admin.dest.create', compact('types'));
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
            'name' => 'required|unique:destinations',
            'type' => 'required',
            'region' => 'required',
            'description' => 'required',
            'address' => 'required',
            'image' => 'required|max:5120',
        ]);

        $destination = Destination::create([
            'name' => $request->name,
            'type' => $request->type,
            'region' => $request->region,
            'description' => $request->description,
            'address' => $request->address,
            'maps_url' => $request->maps_url,
        ]);

        if ($destination) {
            if ($request->image) {
                foreach ($request->file('image') as $key => $image) {
                    $url = $image->store('dest-images');
                    DestinationImage::create([
                        'dest_id' => $destination->id,
                        'url' => $url,
                        'is_cover' => $key == 0,
                    ]);
                }
            }
        }
        return redirect()->route('admin.dashboard.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        $images = DestinationImage::where('dest_id', $destination->id)->orderBy("is_cover", "desc")->get();
        return view('admin.dest.show', compact('destination', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        $types = DestinationType::all();
        return view('admin.dest.edit', compact('types', 'destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'region' => 'required',
            'description' => 'required',
            'address' => 'required',
        ]);

        $destination->update([
            'name' => $request->name,
            'type' => $request->type,
            'region' => $request->region,
            'description' => $request->description,
            'address' => $request->address,
            'maps_url' => $request->maps_url,
        ]);

        return redirect()->route('admin.dashboard.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('admin.dashboard.index')->with('success', 'Data berhasil dihapus');
    }
}
