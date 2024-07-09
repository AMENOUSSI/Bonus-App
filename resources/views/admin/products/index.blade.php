@extends('layouts.admin.main')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">List of products</div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New Product</a>
        </div>
        <div class="card-body">
            <table class="table table-head-bg-success">
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
                    <td> {{$product->id}}</td>
                    <td> {{$product->name}}</td>
                    <td> {{$product->description}}</td>
                    <td> {{$product->price}}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="button-edit"><i class="fa fa-pen-alt  "></i>

                        </a>
                        <a href="{{ route('products.destroy', $product) }}" class="custom-button"
                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();">
                            <i class="fa fa-trash"></i>
                        </a>

                        <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            Pas de donnees
                        </td>
                    </tr>
                @endforelse


                </tbody>
            </table>
            <table class="table table-head-bg-primary mt-4">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection
