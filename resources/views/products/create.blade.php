<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @if ($errors->any())
            <div class="text-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card mt-4">
            <div class="card-header">
                Create Category
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" name="name" placeholder="Enter Product Name"
                        class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="description" class="form-label">Description :</label>
                    <input type="text" name="description" placeholder="Enter Product Description"
                        class="form-control mb-2">
                </div>
                <div class="card-body">
                    <label for="image" class="form-label">IMAGE :</label>
                    <input type="file" name="image" class="form-control" id="image" />
                </div>
                <div class="card-body">
                    <label for="price" class="form-label">Price :</label>
                    <input type="text" name="price" placeholder="Enter Product Price"
                        class="form-control mb-2">
                </div>
                <div class="card-body">
                    <div class="form-check from-switch">
                        <label for="status" class="form-check-label">Active Or Inactive</label>
                        <input type="checkbox" class="form-check-input" name="status" role="switch" checked/>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">+Create</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
