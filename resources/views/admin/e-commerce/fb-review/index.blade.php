@extends('layouts.admin.e-commerce.app')

@section('content')
<div class="container">
    <h1>Facebook Reviews</h1>
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('admin.fb-review.store') }}" method="POST" enctype="multipart/form-data" class="row align-items-end">
                @csrf
                <div class="col-md-10">
                    <label for="image_path" class="form-label">Upload New Review Image</label>
                    <input type="file" name="image_path" id="image_path" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-100">Upload</button>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>
                        <img src="{{ asset($review->image_path) }}" width="50" alt="Review Image">
                    </td>
                    <td>
                        <form action="{{ route('admin.fb-review.destroy', $review) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No Images Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
