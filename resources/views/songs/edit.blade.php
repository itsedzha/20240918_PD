<x-app-layout>
    <div class="w-full max-w-lg mx-auto rounded-lg shadow-lg p-6 bg-gray-900 text-white mb-6">
        <h2 class="font-bold text-2xl mb-6 text-center text-yellow-400">Edit Song</h2>

        <form action="{{ route('songs.update', $song->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Song Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-300 text-sm font-semibold mb-2">Song Title</label>
                <input type="text" name="title" id="title" value="{{ $song->title }}" class="w-full px-4 py-3 rounded-lg bg-gray-800 border-2 border-gray-700 placeholder-gray-400 text-white focus:border-yellow-400 focus:outline-none" placeholder="Enter song title" required>
            </div>

            <!-- Artist -->
            <div class="mb-4">
                <label for="artist" class="block text-gray-300 text-sm font-semibold mb-2">Artist</label>
                <input type="text" name="artist" id="artist" value="{{ $song->artist }}" class="w-full px-4 py-3 rounded-lg bg-gray-800 border-2 border-gray-700 placeholder-gray-400 text-white focus:border-yellow-400 focus:outline-none" placeholder="Enter artist name" required>
            </div>

            <!-- Genre -->
            <div class="mb-4">
                <label for="genre" class="block text-gray-300 text-sm font-semibold mb-2">Genre</label>
                <input type="text" name="genre" id="genre" value="{{ $song->genre }}" class="w-full px-4 py-3 rounded-lg bg-gray-800 border-2 border-gray-700 placeholder-gray-400 text-white focus:border-yellow-400 focus:outline-none" placeholder="Enter genre" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                Update Song
            </button>
        </form>
    </div>
</x-app-layout>
