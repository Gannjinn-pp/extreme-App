<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <ul>
                        <li>
                            <a href="{{ route('homes.index') }}" class="btn btn-primary">Add home</a>
                        </li>
                        <li>
                            <a href="{{ route('reservations.index') }}" class="btn btn-primary">Add Reservation</a>
                        </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
