<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationImage;
use App\Models\DestinationType;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule as ValidationRule;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dests = Destination::with(['destType', 'reviews', 'images'])->orderBy('type')->orderBy('name')->get();
        return view('dashboard.dest.index', compact('dests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = DestinationType::orderBy('name')->get();
        return view('dashboard.dest.create', compact('types'));
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
            'description' => 'required',
            'address' => 'required',
            'maps_url' => 'nullable|url',
            'images' => 'required|max:15000',
        ]);

        $destination = Destination::create([
            'name' => ucwords($request->name),
            'type' => $request->type,
            'description' => $request->description,
            'address' => ucwords($request->address),
            'maps_url' => $request->maps_url,
        ]);

        if ($destination) {
            if ($request->images) {
                foreach ($request->file('images') as $key => $image) {
                    $url = $image->store('dest-images');
                    DestinationImage::create([
                        'dest_id' => $destination->id,
                        'url' => $url,
                        'is_cover' => $key == 0,
                    ]);
                }
            }
        }
        return redirect()->route('admin.destination.index')->with('success', 'Data berhasil disimpan');
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
        $destination = Destination::with(['destType', 'review.user', 'images'])->where('id', $destination->id)->first();
        return view('dashboard.dest.show', compact('destination', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        $types = DestinationType::orderBy('name')->get();
        $destination = Destination::with(['destType', 'reviews.user', 'images'])->where('id', $destination->id)->first();
        return view('dashboard.dest.edit', compact('types', 'destination'));
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
            'name' => ['required', ValidationRule::unique('destinations')->ignore($destination->id)],
            'type' => 'required',
            'description' => 'required',
            'address' => 'required',
            'maps_url' => 'nullable|url',
            'images' => 'max:15000',
        ]);

        $destination->update([
            'name' => ucwords($request->name),
            'type' => $request->type,
            'description' => $request->description,
            'address' => ucwords($request->address),
            'maps_url' => $request->maps_url,
        ]);

        if ($request->delete_image) {
            if (count($request->delete_image) >= count($destination->images)) {
                $request->validate([
                    'images' => ['required'],
                ]);
            }

            foreach ($request->delete_image as $key => $image) {
                $data = DestinationImage::find($image);

                DestinationImage::where('id', $image)->delete();
                Storage::disk('public')->delete($data->image_url);
            }
        }

        if ($request->images && $request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $url = $image->store('dest-images');
                DestinationImage::create([
                    'dest_id' => $destination->id,
                    'url' => $url,
                    'is_cover' => 0,
                ]);
            }
        }

        return redirect()->route('admin.destination.index')->with('success', 'Data berhasil diubah');
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
        return redirect()->route('dashboard.dest.index')->with('success', 'Data berhasil dihapus');
    }
}
