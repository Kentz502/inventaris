@extends('layouts.main')

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Category</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </div>
@endsection

@section('content')
@if (session('success'))
 <script>
    Swal.fire({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success"
    });
    </script>
@endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="/categories/create" class="btn btn-sm btn-primary">
                        Add Category
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach ($categories as $category)
                                <tr>
                                    <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug ?? "-" }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/categories/edit/{{ $category->id }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                                        {{-- <form action="/categories/{{ $category->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form> --}}
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $category->id }}">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                @include('pages.categories.delete-confirmation')
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
