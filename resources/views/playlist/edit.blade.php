<x-app-layout>
    <div class="container mx-auto max-w-lg mt-10 p-6 bg-gray-900 text-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-semibold mb-6 text-center text-green-400">Edit Playlist</h1>
        <form action="{{ route('playlist.update', $playlist->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                <input value="{{ $playlist->name }}" type="text" class="mt-1 block w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 text-white" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="tag" class="block text-sm font-medium text-gray-300">Tag</label>
                <input value="{{ $playlist->tag }}" type="text" class="mt-1 block w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 text-white" id="tag" name="tag" required>
            </div>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-300">
                Save Changes
            </button>
        </form>
    </div>
</x-app-layout>
