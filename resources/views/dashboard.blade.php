<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end">
                <a href="{{ route('homes.index') }}" class="btn bg-orange-600 text-white p-2 mx-2 rounded">家を探す</a>
                <a href="{{ route('homes.create') }}" class="btn bg-orange-600 text-white p-2 mx-2 rounded">Add Home</a>
                @if ($homeFavorite)
                <a href="{{ route('homes.reservations', $homeFavorite->home_id) }}" class="btn bg-orange-600 text-white p-2 mx-2 rounded">マイホーム</a>
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Your Upcoming Reservations</h3>
                    @if($reservations->isEmpty())
                        <p>No reservations found.</p>
                    @else
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Home</th>
                                    <th class="border px-4 py-2">Start Time</th>
                                    <th class="border px-4 py-2">End Time</th>
                                    <th class="border px-4 py-2">Bathing Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $reservation->home->name }}</td>
                                        <td class="border px-4 py-2">{{ $reservation->start_time }}</td>
                                        <td class="border px-4 py-2">{{ $reservation->end_time }}</td>
                                        <td class="border px-4 py-2">{{ ucfirst($reservation->bathing_type) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            <!-- お気に入りの家を表示 -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Your Favorite Home</h3>
                    @if($homeFavorite)
                    <div class="p-4 border rounded-lg">
                        <h4>{{ $homeFavorite->user_id }}</h4>
                        <a href="{{ route('homes.reservations', $homeFavorite->home_id) }}" class="text-blue-500 hover:underline">View Reservations</a>
                    </div>
                    @else
                        <p>You have not favorited any homes yet.</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
