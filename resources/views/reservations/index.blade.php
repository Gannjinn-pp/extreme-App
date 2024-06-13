<!-- resources/views/homes/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Homes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Homes</h1>
        <a href="{{ route('homes.create') }}" class="btn btn-primary">Add Home</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($homes as $home)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $home->name }}</td>
                <td>
                    <form action="{{ route('homes.destroy',$home->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('homes.show',$home->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('homes.edit',$home->id) }}">Edit</a>
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
