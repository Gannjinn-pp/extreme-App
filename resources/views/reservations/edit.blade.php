<!DOCTYPE html>
<html>
<head>
    <title>Edit Reservation</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Reservation</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="home_id">Home:</label>
                <select name="home_id" class="form-control">
                    @foreach ($homes as $home)
                        <option value="{{ $home->id }}" {{ $home->id == $reservation->home_id ? 'selected' : '' }}>{{ $home->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->start_time)->format('Y-m-d\TH:i') }}">
            </div>
            <div class="form-group">
                <label for="end_time">End Time:</label>
                <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $reservation->end_time)->format('Y-m-d\TH:i') }}">
            </div>
            <div class="form-group">
                <label for="bathing_type">Bathing Type:</label>
                <select name="bathing_type" class="form-control">
                    <option value="bath" {{ $reservation->bathing_type == 'bath' ? 'selected' : '' }}>Bath</option>
                    <option value="shower" {{ $reservation->bathing_type == 'shower' ? 'selected' : '' }}>Shower</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
