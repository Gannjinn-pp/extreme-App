<x-app-layout>
    <div class="container mx-auto p-4">
    <div class="container">
        <h1>Reservations</h1>
        <h2><button><a href="{{ route('dashboard')}}">back</a></button></h2>
        <a href="{{ route('reservations.create') }}" class="btn btn-primary">Add Reservation</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Home</th>
                <th>user_id</th>
                <th>_id</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Bathing Type</th>
                <th >Action</th>
            </tr>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $reservation->home->name }}</td>
                <td>{{ $reservation->user_id }}</td>
                <td>{{ $reservation->home_id }}</td>
                <td>{{ $reservation->start_time }}</td>
                <td>{{ $reservation->end_time }}</td>
                <td>{{ $reservation->bathing_type }}</td>
                <td>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                        @can('update', $reservation)
                            <a class="btn btn-primary" href="{{ route('reservations.edit', $reservation->id) }}">Edit</a>
                        @endcan

                        @can('delete', $reservation)
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
