@extends('layouts.admin.main')

@section('content')

    <div class="card mt-3">
        <div class="card-body overflow-hidden">
            <div class="overflow-hidden" id="main">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">List of Products</div>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus-circle" id="icon-rounded"></i>
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="overflow-auto">
                    <table class="table table-head-bg-secondary table-responsive">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-pen"></i> Edit
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                           onclick="event.preventDefault(); confirmDelete({{ $product->id }});">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                    <form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $products->links() }}
        </div>
    </div>

    <script>
        function confirmDelete(productId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + productId).submit();
                }
            })
        }

        // Check for success message to display
        @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        @endif

        // Check for error message to display
        @if(session('error'))
        Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        @endif
    </script>
@endsection
