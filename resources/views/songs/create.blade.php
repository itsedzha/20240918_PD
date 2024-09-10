<x-app-layout>
    <div class="w-full max-w-lg mx-auto rounded-lg shadow-lg p-6 bg-gray-900 text-white mb-6">
        <h2 class="font-bold text-2xl mb-6 text-center text-green-400">Create a New Song</h2>

        <form action="{{ route('songs.store') }}" method="POST">
            @csrf
            <!-- Song Title -->
            <div class="mb-4">
                <label for="title" class="block text-gray-300 text-sm font-semibold mb-2">Song Title</label>
                <input type="text" name="title" id="title" class="w-full px-4 py-3 rounded-lg bg-gray-800 border-2 border-gray-700 placeholder-gray-400 text-white focus:border-green-400 focus:outline-none" placeholder="Enter song title" required>
            </div>

            <!-- Artist -->
            <div class="mb-4">
                <label for="artist" class="block text-gray-300 text-sm font-semibold mb-2">Artist</label>
                <input type="text" name="artist" id="artist" class="w-full px-4 py-3 rounded-lg bg-gray-800 border-2 border-gray-700 placeholder-gray-400 text-white focus:border-green-400 focus:outline-none" placeholder="Enter artist name" required>
            </div>

            <!-- Genre -->
            <div class="mb-4">
                <label for="genre" class="block text-gray-300 text-sm font-semibold mb-2">Genre</label>
                <input type="text" name="genre" id="genre" class="w-full px-4 py-3 rounded-lg bg-gray-800 border-2 border-gray-700 placeholder-gray-400 text-white focus:border-green-400 focus:outline-none" placeholder="Enter genre" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                Create Song
            </button>
        </form>
    </div>
</x-app-layout>
