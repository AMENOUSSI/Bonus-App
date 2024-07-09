
@extends('layouts.admin.main')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title">List of sales</div>
            <a href="{{ route('admin.sales.create') }}" class="btn btn-primary">Add New Sale</a>
        </div>
        <div class="card-body">
            <table class="table table-head-bg-success">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td> {{$sale->id}}</td>
                        <td> {{$sale->user->first_name}}</td>
                        <td> {{$sale->product->name}}</td>
                        <td> {{$sale->product->price}}</td>
                        <td> {{$sale->quantity}}</td>
                        <td> {{$sale->total_price}}</td>
                        <td>
                            <a href="{{ route('admin.sales.edit', $sale) }}" class="button-edit"><i class="fa fa-pen-square  "></i>

                            </a>
                            <a href="{{ route('admin.sales.destroy', $sale) }}" class="custom-button"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $sale->id }}').submit();">
                                <i class="fa fa-trash"></i>
                            </a>

                            <form id="delete-form-{{ $sale->id }}" action="{{ route('sales.destroy', $sale) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
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
              {{ $sales->links() }}
        </div>
    </div>
@endsection
