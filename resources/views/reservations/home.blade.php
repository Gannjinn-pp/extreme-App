<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-orange-600 mb-4">予約カレンダー：{{ $home->name }}</h1>
        <a href="{{ route('homes.index') }}" class="btn bg-orange-600 text-white p-2 rounded mb-4">ホームに戻る</a>

        @php
            $startDate = \Carbon\Carbon::now();
            $endDate = \Carbon\Carbon::now()->addDays(4);
            $dates = new \Carbon\CarbonPeriod($startDate, $endDate);

            $startTime = \Carbon\Carbon::createFromTimeString('00:00');
            $endTime = \Carbon\Carbon::createFromTimeString('23:30');
            $timeSlots = new \Carbon\CarbonPeriod($startTime, '30 minutes', $endTime);
        @endphp

        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2"></th>
                        @foreach ($dates as $index => $date)
                            <th class="px-4 py-2 {{ $index > 0 ? 'hidden sm:table-cell' : '' }}">{{ $date->format('m/d') }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timeSlots as $timeSlot)
                        <tr>
                            <td class="border px-4 py-2">{{ $timeSlot->format('H:i') }}</td>
                            @foreach ($dates as $index => $date)
                            @php
                                $startDateTime = $date->copy()->setTimeFrom($timeSlot);
                                $endDateTime = $startDateTime->copy()->addMinutes(30);

                                $reservation = $reservations->where('start_time', '>=', $startDateTime)
                                                            ->where('start_time', '<', $endDateTime)
                                                            ->first();
                                $symbol = $reservation ? ($reservation->bathing_type == 'bath' ? 'お風呂' : 'シャワー') : '';
                                $bgColor = $symbol == 'お風呂' ? 'bg-blue-200' : ($symbol == 'シャワー' ? 'bg-orange-200' : '');
                            @endphp
                            <td class="hover:bg-slate-400 border px-4 py-2 text-center {{ $index > 0 ? 'hidden sm:table-cell' : '' }} {{ $bgColor }}"
                                data-start-time="{{ $startDateTime }}"
                                data-end-time="{{ $endDateTime }}"
                                onclick="openReservationModal('{{ $startDateTime->format('Y-m-d\TH:i') }}', '{{ $endDateTime->format('Y-m-d\TH:i') }}')">
                                {{ $symbol }}
                            </td>
                        @endforeach

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Reservation Modal -->
        <div id="reservationModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded-lg">
                <form id="reservationForm" method="POST" action="{{ route('reservations.store') }}">
                    @csrf
                    <input type="hidden" name="home_id" value="{{ $home->id }}">
                    <input type="hidden" name="start_time" id="modalStartTime">
                    <input type="hidden" name="end_time" id="modalEndTime">

                    <div class="mb-4">
                        <label for="bathing_type" class="block text-gray-700">入浴の種類は？</label>
                        <select name="bathing_type" id="bathing_type" class="form-select mt-1 block w-full">
                            <option value="bath">お湯に浸かる</option>
                            <option value="shower">シャワー</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" onclick="closeReservationModal()" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded">キャンセル</button>
                        <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded">予約</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function openReservationModal(startTime, endTime) {
                document.getElementById('modalStartTime').value = startTime;
                document.getElementById('modalEndTime').value = endTime;
                document.getElementById('reservationModal').classList.remove('hidden');
            }

            function closeReservationModal() {
                document.getElementById('reservationModal').classList.add('hidden');
            }
        </script>
    </div>
</x-app-layout>
