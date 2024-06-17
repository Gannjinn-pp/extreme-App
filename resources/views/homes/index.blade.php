<!DOCTYPE html>
<html>
<head>
    <title>Homes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Homes</h1>
        <h2><button><a href="{{ route('dashboard')}}">back</a></button></h2>
        <a href="{{ route('homes.create') }}" class="btn btn-primary">Add Home</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>created_user_id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            @foreach ($homes as $home)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $home->name }}</td>
                <td>{{ $home->user_id }}</td>
                <td>
                    <form action="{{ route('homes.destroy', $home->id) }}" method="POST">
                        @can('update', $home)
                            <a class="btn btn-primary" href="{{ route('homes.edit', $home->id) }}">Edit</a>
                        @endcan
                        @can('delete', $home)
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
</body>
</html>
