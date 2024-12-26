<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div>
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    Edit Product
                </div>
                {{-- {{dd($product)}} --}}
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <label for="name" class="form-label">Name :</label>
                        <input type="text" name="name" class="form-control card-body"
                            value="{{ $product->name }}" />
                    </div>
                    <div class="card-body">
                        <label for="description" class="form-label">Description :</label>
                        <input type="text" name="description" class="form-control card-body"
                            value="{{ $product->description }}" />
                    </div>
                    <div class="card-body">
                        <label for="price" class="form-label">Price :</label>
                        <input type="text" name="price" class="form-control card-body"
                            value="{{ $product->price }}" />
                    </div>
                    <div class="card-body">
                        <label for="image" class="form-label">Image :</label>
                        <img src="{{ asset('productImages/' . $product->image) }}" alt="{{ $product->image }}"
                            style="width:100px; height:100px" />
                    </div>
                    <div class="card-body">
                        <div class="form-check form-switch">
                            <label class="form-check-label">Active or Inactive</label>
                            <input class="form-check-input" name="status" type="checkbox" role="switch"
                                {{ $product->status === 1 ? 'checked' : '' }} />
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="category" class="form-label">Select Your Category</label>
                        <select name="category_id" id="category_id" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : "" }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
