<!DOCTYPE html>
<html>
<head>
    <title>Create Reservation</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Create Reservation</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="home_id">Home:</label>
                <select name="home_id" class="form-control">
                    @foreach ($homes as $home)
                        <option value="{{ $home->id }}">{{ $home->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time:</label>
                <input type="datetime-local" class="form-control" id="start_time" name="start_time">
            </div>
            <div class="form-group">
                <label for="end_time">End Time:</label>
                <input type="datetime-local" class="form-control" id="end_time" name="end_time">
            </div>
            <div class="form-group">
                <label for="bathing_type">Bathing Type:</label>
                <select name="bathing_type" class="form-control">
                    <option value="bath">Bath</option>
                    <option value="shower">Shower</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
