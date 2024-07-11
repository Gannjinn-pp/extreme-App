<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-orange-600 mb-4">一覧</h1>
        <h2 class="mb-4"><button class="bg-white text-orange-600 px-4 py-2 rounded"><a href="{{ route('dashboard')}}">戻る</a></button></h2>
        <a href="{{ route('homes.create') }}" class="btn bg-orange-600 text-white p-2 rounded mb-4">家の新規作成</a>

        @if ($message = Session::get('home_success'))
            <div class="alert alert-success bg-green-100 text-green-800 p-4 rounded my-4">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if(session('success'))
            <div class= "alert alert-success bg-green-100 text-green-800 p-4 rounded my-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            @foreach ($homes as $home)
            <div class="bg-white rounded shadow-md p-4">
                <div class="mb-2">
                    <span class="text-gray-600 font-bold"> 作成者 ID:</span> {{ $home->user_id }}
                </div>
                <div class="mb-2">
                    <span class="text-gray-600 font-bold">名前:</span> {{ $home->name }}
                </div>
                <div class="flex space-x-2 mt-4">
                    <a class="btn bg-orange-500 text-white px-4 py-2 rounded" href="{{ route('homes.edit', $home->id) }}">詳細</a>
                    <a class="btn bg-slate-500 text-white px-4 py-2 rounded" href="{{ route('homes.reservations', $home->id) }}">予約</a>
                {{--  --}}
                @if (Auth::user()->homeFavorite && Auth::user()->homeFavorite->home_id == $home->id)
                <form action="{{ route('homes.unfavorite', $home->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-yellow-500 text-white px-4 py-2 rounded">お気に入り</button>
                </form>
            @else
                <form action="{{ route('homes.favorite', $home->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn bg-slate-500 text-white px-4 py-2 rounded">お気に入り追加</button>
                </form>
            @endif

                {{--  --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
