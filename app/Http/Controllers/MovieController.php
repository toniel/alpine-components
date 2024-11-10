<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Artist;
use App\Models\Studio;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('movies.index',[
            'studios' => Studio::get(['id','name'])->map(fn($studio)=>[
                'value' => $studio->id,
                'label' => $studio->name
            ]),
            'movies' => Movie::with(['studio','artists'])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'synopsis'=> 'required',
            'year'=> 'required',
            'studio_id'=> 'required',
            'artists'=> 'required',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::with(['studio','artists'])->find($id);
         return response()->json($movie, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
