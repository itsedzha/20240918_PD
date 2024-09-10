<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        return view('songs.create'); // Ensure the view is correctly referenced
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'artist' => 'required',
        'genre' => 'required'
    ]);

    Song::create($request->all());

    return redirect()->route('songs.index')->with('success', 'Song created successfully.');
}


    public function show($id)
    {
        $song = Song::findOrFail($id);
        return view('songs.show', compact('song'));
    }

 public function edit($id)
{
    $song = Song::findOrFail($id);
    return view('songs.edit', compact('song'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'genre' => 'required',
        ]);

        $song = Song::findOrFail($id);
        $song->update($request->all());

        return redirect()->route('songs.index')->with('success', 'Song updated successfully.');
    }

    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Song deleted successfully.');
    }
}
