<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-orange-600 mb-4">Edit Home</h1>
        <h2 class="mb-4"><button class="bg-white text-orange-600 px-4 py-2 rounded"><a href="{{ route('dashboard')}}">Back</a></button></h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('homes.update', $home->id) }}" method="POST" class="bg-white p-6 rounded shadow-md w-2/3 mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" class="form-control border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:border-orange-500" id="name" name="name" value="{{ $home->name }}">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Update</button>
        </form>
        @can('delete', $home)
            <form action="{{ route('homes.destroy' ,$home->id) }}" method="POST" class="bg-white p-6 rounded shadow-md w-2/3 mx-auto my-1">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-400">消去</button>
            </form>
        @endcan
    </div>
</x-app-layout>
