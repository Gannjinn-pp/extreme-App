<!DOCTYPE html>
<html>
<head>
    <title>Reservations</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
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
                <td>{{ $reservation->start_time }}</td>
                <td>{{ $reservation->end_time }}</td>
                <td>{{ $reservation->bathing_type }}</td>
                <td>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('reservations.edit', $reservation->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
