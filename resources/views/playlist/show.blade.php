<x-app-layout>
    <div class="w-full max-w-6xl mx-auto rounded-lg shadow-lg p-6 bg-gray-900 text-white mb-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl text-green-400">{{ $playlist->name }}</h2>
                <div class="mt-2">
                    <span class="inline-block bg-gray-700 text-gray-300 rounded-full px-4 py-1 text-sm font-semibold">
                        {{ $playlist->tag }}
                    </span>
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('playlist.edit', $playlist->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                    Edit
                </a>
                <form action="{{ route('playlist.destroy', $playlist->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                        Delete
                    </button>
                </form>
            </div>
        </div>

        <!-- Display Songs in the Playlist -->
        <div class="mb-6">
            <h3 class="font-bold text-xl text-green-400 mb-4">Songs in this Playlist:</h3>
            <table class="w-full text-left table-auto bg-gray-800 rounded-lg">
                <thead class="text-gray-300 text-lg border-b border-gray-700">
                    <tr>
                        <th class="px-4 py-3">Song Title</th>
                        <th class="px-4 py-3">Artist</th>
                        <th class="px-4 py-3">Actions</th> <!-- Column for the remove button -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($playlist->songs as $song)
                        <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                            <td class="px-4 py-4">{{ $song->title }}</td>
                            <td class="px-4 py-4">{{ $song->artist }}</td>
                            <td class="px-4 py-4">
                                <!-- Remove song from playlist button -->
                                <form action="{{ route('playlists.removeSong', ['playlistId' => $playlist->id, 'songId' => $song->id]) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Form to Add a Song to the Playlist -->
        <div class="mb-6">
            <h3 class="font-bold text-xl text-green-400 mb-4">Add a Song to this Playlist:</h3>
            <form action="{{ route('playlist.addSong', $playlist->id) }}" method="POST">
                @csrf
                <select name="song_id" class="border rounded-lg w-full py-3 px-4 mb-4 text-gray-900 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-400">
                    @foreach($songs as $song)
                        <option value="{{ $song->id }}">{{ $song->title }} - {{ $song->artist }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                    Add Song
                </button>
            </form>
        </div>

        <!-- Button to Create a New Song -->
        <div>
            <a href="{{ route('songs.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                Create Song
            </a>
        </div>
    </div>
</x-app-layout>
