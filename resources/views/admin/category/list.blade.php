@extends('admin.layouts.app')

@section('content')

<section class="content-header">
  <div class="container my-3">
    <div class="row mb-4">
      <div class="col-md-6">
        <h1>Categories</h1>
      </div>
      <div class="col-md-6 text-end">
        <a href="create-category.html" class="btn btn-primary">New Category</a>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container">
    <div class="card shadow-sm">

      @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('error') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif

      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Category List</h5>
        <form class="d-flex" role="search" method="GET">
          <div class="card-deading">

            <button onclick="window.location='{{ route('categories.index') }}'" type="button" class="btn btn-default btn-sm">RESET</button>
          </div>
          <input value="{{ request()->get('keyword') }}" name="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            @if ($category->status == 1)
                                <svg class="text-success" width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @else
                                <svg class="text-danger" width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">không được tìm thấy</td>
                </tr>
            @endif
          </tbody>
        </table>
      </div>
      <div class="card-footer d-flex justify-content-end">
        <nav aria-label="Page navigation">
            {{ $categories->links() }}
        </nav>
      </div>
    </div>
  </div>
</section>

@endsection

@section('customJs')

@endsection
