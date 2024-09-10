<x-app-layout>
    <div class="w-full max-w-6xl mx-auto rounded-lg shadow-lg p-6 bg-gray-900 text-white mb-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-bold text-2xl text-green-400">All Songs</h2>
            <!-- Add Song Button -->
            <a href="{{ route('songs.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg shadow-lg transition duration-300">
                Add Song
            </a>
        </div>
        <table class="w-full text-left table-auto bg-gray-800 rounded-lg">
            <thead>
                <tr class="text-gray-300 text-lg border-b border-gray-700">
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Artist</th>
                    <th class="px-4 py-3">Genre</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($songs as $song)
                    <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                        <td class="px-4 py-4">{{ $song->title }}</td>
                        <td class="px-4 py-4">{{ $song->artist }}</td>
                        <td class="px-4 py-4">{{ $song->genre }}</td>
                        <td class="px-4 py-4 text-center">
                        <a href="{{ route('songs.edit', $song->id) }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 mr-2">
    Edit
</a>

                            <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
