
@extends('layouts.admin.main')

@section('content')
    <div class="card mt-3">

        <div class="card-body">
            <div class="table-responsive" id="main">
                <div class="card-header d-flex justify-content-between align-items-center" >
                    <div class="card-title">List of sales</div>
                    <a href="{{ route('admin.sales.create') }}" class="btn btn-primary btn-rounded"><i class="fa fa-plus-circle" id="icon-rounded"></i></a>
                </div>
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
                           <td >
                               <div class="btns">
                                   <a href="{{ route('admin.sales.edit', $sale) }}" ><i class="fa fa-pen  "></i>

                                   </a>

                               </div>
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
           </div>
              {{ $sales->links() }}
        </div>
    </div>

    <script>
        function confirmDelete(saleId) {
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
                    document.getElementById('delete-form-' + saleId).submit();
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
