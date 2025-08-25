@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Create Food Item</h5>

                <form method="POST" action="{{ route('foods.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Name input -->
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>

                    <!-- Price input -->
                    <div class="mb-3">
                        <input type="number" name="price" class="form-control" placeholder="Price" required>
                    </div>

                    <!-- Image input -->
                    <div class="mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>

                    <!-- Category select -->
                    <div class="mb-3">
                        <select name="category" class="form-select" required>
                            <option value="" selected disabled>Choose Category</option>
                            <option value="Breakfast">Breakfast</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                        </select>
                    </div>

                    <!-- Description textarea -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary w-100">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
