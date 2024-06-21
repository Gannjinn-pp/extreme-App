<x-app-layout>
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-orange-600 mb-6">予約詳細</h1>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">予約ID:</label>
                <p class="text-gray-900">{{ $reservation->id }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">予約者名:</label>
                <p class="text-gray-900">{{ $reservation->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">予約日時:</label>
                <p class="text-gray-900">{{ $reservation->date }} {{ $reservation->time }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">ステータス:</label>
                <p class="text-gray-900">{{ $reservation->status }}</p>
            </div>
            <div class="flex justify-between mt-6">
                <a href="{{ route('reservations.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">戻る</a>
                <a href="{{ route('reservations.edit', $reservation->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">編集</a>
            </div>
        </div>
    </div>
</x-app-layout>
