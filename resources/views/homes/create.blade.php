<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-orange-600 mb-4">家を新規作成</h1>
        <h2 class="mb-4"><button class="bg-white text-orange-600 px-4 py-2 rounded"><a href="{{ route('homes.index')}}">戻る</a></button></h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('homes.store') }}" method="POST" class="bg-white p-6 rounded shadow-md w-2/3 mx-auto">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">新たに作成する家の名前を入力してください:</label>
                <input type="text" class="border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:border-orange-500" id="name" name="name">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">送信</button>
        </form>
    </div>
</x-app-layout>
