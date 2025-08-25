@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if(Session::has('danger'))
            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @endif
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0"><b>Food</b></h5>
                        <a href="{{ route('foods.create') }}" class="btn btn-primary btn-sm">+ Add Food</a>
                    </div>

                    <table class="table table-bordered table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th width="160">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($foods as $food)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $food->name }}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/' . $food->image.'') }}" 
                                             alt="{{ $food->name }}" 
                                             width="80" class="img-thumbnail">
                                    </td>
                                    <td>${{ number_format($food->price) }}</td>
                                    <td>{{ ucfirst($food->category) }}</td>
                                    <td>{{ Str::limit($food->description, 50) }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('foods.edit', $food->id) }}" 
                                               class="btn btn-sm btn-warning">Change</a>
                                            <a href="{{ route('foods.delete', $food->id) }}" 
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Are you sure want to delete this booking?')">
                                               Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No foods found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
@endsection
