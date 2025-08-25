@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4"><b>Edit Food</b></h5>

                <form action="{{ route('foods.update', $food->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Food Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $food->name) }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Food Image</label><br>

                        @if($food->image && file_exists(public_path('assets/img/' . $food->image)))
                            <img src="{{ url('assets/img/' . $food->image) }}" 
                                alt="{{ $food->name }}" 
                                width="100" 
                                class="mb-2 img-thumbnail">
                        @else
                            <p class="text-muted">No image available</p>
                        @endif

                        <input type="file" class="form-control" name="image">
                        <small class="text-muted">Leave empty if you don't want to change image</small>
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="price">Price ($)</label>
                        <input type="number" class="form-control" name="price" value="{{ old('price', $food->price) }}">
                        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="category">Category</label>
                        <select class="form-control" name="category">
                            <option value="breakfast" {{ $food->category=='breakfast'?'selected':'' }}>Breakfast</option>
                            <option value="lunch" {{ $food->category=='lunch'?'selected':'' }}>Lunch</option>
                            <option value="dinner" {{ $food->category=='dinner'?'selected':'' }}>Dinner</option>
                        </select>
                        @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="3" name="description">{{ old('description', $food->description) }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">Update Food</button>
                    <a href="{{ route('foods.all') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
