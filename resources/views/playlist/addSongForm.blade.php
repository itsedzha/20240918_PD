<x-app-layout>
    <div class="container mx-auto max-w-lg mt-10 p-6 bg-gray-900 text-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-semibold mb-6 text-center text-green-400">Add a Song to {{ $playlist->name }}</h2>
        
        <form action="{{ route('playlist.addSong', $playlist->id) }}" method="POST" class="space-y-6">
            @csrf
            <div class="form-group">
                <label for="song" class="block text-sm font-medium text-gray-300">Select Song</label>
                <select name="song_id" id="song" class="mt-1 block w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 text-white">
                    @foreach($songs as $song)
                        <option value="{{ $song->id }}">{{ $song->title }} by {{ $song->artist }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-300">
                Add Song
            </button>
        </form>
    </div>
</x-app-layout>
