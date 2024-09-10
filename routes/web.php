<?php
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Playlist Routes
Route::resource('playlist', PlaylistController::class);
Route::get('playlists/{id}/addSong', [PlaylistController::class, 'showAddSongForm'])->name('playlist.addSongForm'); // Route to show the add song form
Route::post('playlists/{id}/addSong', [PlaylistController::class, 'addSong'])->name('playlist.addSong'); // Route to actually add the song
Route::post('playlists/{playlistId}/removeSong/{songId}', [PlaylistController::class, 'removeSong'])->name('playlists.removeSong'); // Route to remove a song from the playlist

// Song Routes
Route::get('/songs/create', [SongController::class, 'create'])->name('songs.create');
Route::post('/songs', [SongController::class, 'store'])->name('songs.store');
Route::resource('songs', SongController::class);

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
