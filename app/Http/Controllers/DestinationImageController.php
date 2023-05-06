<?php

namespace App\Http\Controllers;

use App\Models\DestinationImage;
use Illuminate\Http\Request;

class DestinationImageController extends Controller
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
        $request->validate([
            'dest_id' => 'required',
            'image' => 'required|max:5120',
        ]);

        if ($request->image) {
            foreach ($request->file('image') as $key => $image) {
                $url = $image->store('dest-images');
                DestinationImage::create([
                    'dest_id' => $request->dest_id,
                    'url' => $url,
                    'is_cover' => 0,
                ]);
            }
        }

        return redirect()->route('destination.show', $request->dest_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DestinationImage  $destinationImage
     * @return \Illuminate\Http\Response
     */
    public function show(DestinationImage $destinationImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DestinationImage  $destinationImage
     * @return \Illuminate\Http\Response
     */
    public function edit(DestinationImage $destinationImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DestinationImage  $destinationImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DestinationImage $destinationImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DestinationImage  $destinationImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestinationImage $destinationImage)
    {
        //
    }

    public function deleteImage(Request $request)
    {
        $request->validate([
            'image_id' => 'required'
        ]);

        foreach ($request->image_id as $key => $image) {
            $url = DestinationImage::find($image)->url;
            DestinationImage::destroy($image);
            // Storage::delete($url);
        }

        return back()->with('success', 'Image(s) deleted successfully');
    }

    public function changeCover(Request $request, $id)
    {
        $request->validate([
            'image_id' => 'required'
        ]);
        $old_cover = DestinationImage::where('dest_id', $id)->where('is_cover', 1)->update(['is_cover' => 0]);
        $new_cover = DestinationImage::find($request->image_id)->update(['is_cover' => 1]);

        return back()->with('success', 'Cover berhasil diubah');
    }
}
