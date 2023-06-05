<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationImage;
use App\Models\DestinationReview;
use App\Models\DestinationType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::with(['destType'])->orderBy("name", "asc")->get();
        $covers = DestinationImage::where('is_cover', 1)->get();
        $banners = DestinationImage::with(['destination'])->inRandomOrder()->limit(7)->get();
        $type = DestinationType::all();

        $galleries = DestinationImage::with(['destination.reviews'])->limit(15)->inRandomOrder()->get();

        foreach ($galleries as $key => $gallery) {
            $total_rate = 0;
            foreach ($gallery->destination->reviews as $idx => $review) {
                $total_rate += $review->rate;
            }

            $gallery->rate = $total_rate > 0 ? intval(floor($total_rate / count($gallery->destination->reviews))) : 0;
        }

        // ddd($galleries);

        return view('home', compact('destinations', 'covers', 'type', 'galleries', 'banners'));
    }

    public function browse(Request $request)
    {
        // ddd($request);
        $destinations = Destination::with(['destType', 'images', 'reviews.user']);

        if ($request->name) {
            $destinations->where('name', 'LIKE', '%' . $request->name . '%');
        }

        if ($request->category && $request->category != 'Semua') {
            $destinations->whereHas('destType', function ($query) use ($request) {
                $query->whereIn('name', $request->category);
            });
        }

        $destinations = $destinations->orderBy("name", "asc")->get();
        $types = DestinationType::orderBy('name')->get();

        foreach ($destinations as $key => $data) {
            $rate = 0;
            foreach ($data->reviews as $key => $review) {
                $rate += $review->rate;
            }

            $rate = $rate > 0 ? intval(floor($rate / count($data->reviews))) : 0;

            $data->rate = $rate;
        }

        // ddd($destinations);

        return view('browse', compact('destinations', 'types'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destination = Destination::with(['destType', 'reviews', 'images'])->find($id);
        return view('detail', compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function store_review(Request $request)
    {
        // ddd($request);
        $request->validate([
            'rate' => ['required'],
            'message' => ['required'],
        ]);

        DestinationReview::create([
            'rate' => $request->rate,
            'message' => $request->message,
            'dest_id' => $request->dest_id,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success');
    }
}
