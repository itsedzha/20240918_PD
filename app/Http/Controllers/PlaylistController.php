<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song; // Added the Song model
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::all();
        return view('playlist.index', compact('playlists'));
    }

    public function create()
    {
        return view('playlist.create'); // Ensure it points to the correct view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tag' => 'required',
        ]);

        Playlist::create($request->all());

        return redirect()->route('playlist.index')->with('success', 'Playlist created successfully.');
    }

    public function show($id)
    {
        $playlist = Playlist::findOrFail($id);
        $songs = Song::all(); // Fetch all songs to display them in the dropdown for adding songs
        return view('playlist.show', compact('playlist', 'songs'));
    }

    public function edit($id)
    {
        $playlist = Playlist::findOrFail($id);
        return view('playlist.edit', compact('playlist'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'tag' => 'required',
        ]);

        $playlist = Playlist::findOrFail($id);
        $playlist->update($request->all());

        return redirect()->route('playlist.index')->with('success', 'Playlist updated successfully.');
    }

    public function destroy($id)
    {
        $playlist = Playlist::findOrFail($id);
        $playlist->delete();

        return redirect()->route('playlist.index')->with('success', 'Playlist deleted successfully.');
    }

    public function addSong(Request $request, $id)
    {
        $playlist = Playlist::findOrFail($id);
        $playlist->songs()->attach($request->song_id); // Attach selected song to the playlist

        return redirect()->route('playlist.show', $playlist->id)->with('success', 'Song added to playlist successfully.');
    }

    public function showAddSongForm($id)
    {
        $playlist = Playlist::findOrFail($id);
        $songs = Song::all(); // Get all songs to display in the dropdown

        return view('playlist.addSongForm', compact('playlist', 'songs'));
    }

    public function removeSong($playlistId, $songId)
{
    $playlist = Playlist::findOrFail($playlistId);
    $playlist->songs()->detach($songId); // Remove the song from the playlist

    return redirect()->route('playlist.show', $playlist->id)->with('success', 'Song removed from playlist successfully.');
}

}
