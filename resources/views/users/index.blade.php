<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h4 class="m-4">User List</h4>
        <a href="{{route('users.create')}}" class="btn btn-outline-success mb-4">+Create</a>
        <table class="table table-bordered">
            <thead>
                <th class="bg-primary text-white">ID</th>
                <th class="bg-primary text-white">NAME</th>
                <th class="bg-primary text-white">EMAIL</th>
                <th class="bg-primary text-white">ACTION</th>
            </thead>
            <tbody>
                @foreach ($users as $data)
                    <tr>
                        <th>{{$data['id']}}</th>
                        <th>{{$data['name']}}</th>
                        <th>{{$data['email']}}</th>
                        <th class="d-flex">
                            <a href="{{ route('users.edit', ['user' => $data->id]) }}" class="btn btn-outline-secondary me-2">Edit</a>
                            <form action="{{route('users.destroy', $data->id)}}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
</body>
</html>
