<x-app-layout>
    <style>
        /* Custom button styling for a minimal Spotify-like look */
        .button {
            font-size: 17px;
            border-radius: 8px;
            background: linear-gradient(180deg, rgb(34, 34, 34) 0%, rgb(24, 24, 24) 100%);
            color: #fff;
            padding: 10px 20px;
            font-weight: 600;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s;
        }

        .button:hover {
            background-color: #1db954;
            color: #fff;
        }

        .button-add-song {
            background-color: #282828;
            color: #fff;
        }

        .button-add-song:hover {
            background-color: #1db954;
        }
    </style>

    <div class="flex justify-end mb-6 space-x-4">
        <!-- Create Playlist Button -->
        <a href="{{ route('playlist.create') }}" class="button">
            <span>Create Playlist</span>
        </a>

        <!-- Create Song Button -->
        <a href="{{ route('songs.create') }}" class="button">
            <span>Create Song</span>
        </a>
    </div>

    <div class="gap-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($playlists as $playlist)
        <div class="rounded-lg overflow-hidden shadow-lg p-6 bg-gray-900 text-white mb-6 transition-transform transform hover:scale-105">
            <div class="flex justify-between items-center">
                <div>
                    <a class="text-2xl font-semibold hover:text-green-400" href="{{ route('playlist.show', $playlist->id) }}">
                        {{ $playlist->name }}
                    </a>
                    <div class="text-sm text-gray-500 mt-2">
                        <span class="inline-block bg-gray-700 text-gray-300 rounded-full px-3 py-1 text-sm mr-2 mb-2">
                            {{ $playlist->tag }}
                        </span>
                    </div>
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('playlist.show', $playlist->id) }}" class="button bg-gray-700 hover:bg-gray-800 text-white font-bold">
                        View
                    </a>
                    <a href="{{ route('playlist.edit', $playlist->id) }}" class="button bg-gray-700 hover:bg-gray-800 text-white font-bold">
                        Edit
                    </a>
                    <form action="{{ route('playlist.destroy', $playlist->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button bg-red-600 hover:bg-red-700 text-white font-bold">
                            Delete
                        </button>
                    </form>
                    <a href="{{ route('playlist.addSongForm', $playlist->id) }}" class="button-add-song hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        Add Song
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
