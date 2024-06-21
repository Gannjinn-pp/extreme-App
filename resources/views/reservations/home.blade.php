<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-orange-600 mb-4">Reservations for {{ $home->name }}</h1>
        <a href="{{ route('homes.index') }}" class="btn bg-orange-600 text-white p-2 rounded mb-4">Back to Homes</a>

        @if ($reservations->isEmpty())
            <p>No reservations for this home.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                @foreach ($reservations as $reservation)
                <div class="bg-white rounded shadow-md p-4">
                    <div class="mb-2">
                        <span class="text-gray-600 font-bold">Reservation ID:</span> {{ $reservation->id }}
                    </div>
                    <div class="mb-2">
                        <span class="text-gray-600 font-bold">Start Time:</span> {{ $reservation->start_time }}
                    </div>
                    <div class="mb-2">
                        <span class="text-gray-600 font-bold">End Time:</span> {{ $reservation->end_time }}
                    </div>
                    <div class="mb-2">
                        <span class="text-gray-600 font-bold">Bathing Type:</span> {{ $reservation->bathing_type }}
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
