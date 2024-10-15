

@extends('layouts.admin.main')

@section('content')
    <div class="card table-responsive">
        <div class="card-header d-flex justify-content-between align-items-center" id="main">
            <div class="m-4">
                <h1 class="user-details">
                    Détails de l'utilisateur :
                    <span class="name">{{ $user->first_name }}</span>
                    <span class="name">{{ $user->last_name }}</span>
                </h1>
            </div>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                &rightarrow;
            </a>
        </div>
        <div class="card-body">
            <div class="purchases">
                <h2>Achats</h2>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-head-bg-success table-responsive">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                   {{-- <th scope="col">Actions</th>--}}
                </tr>
                </thead>
                <tbody>
                @forelse($user->sales as $sale)
                    <tr>
                        <td> {{$sale->id}}</td>
                        <td> {{$sale->product->name}}</td>
                        <td> {{$sale->product->price}}</td>
                        <td> {{$sale->quantity}}</td>
                        <td> {{$sale->total_price}}</td>
                        {{--<td>
                            <div class="btns">

                                <a href="{{ route('admin.sales.destroy', $user) }}" class="user-delete"
                                   onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                            </div>
                        </td>--}}
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

            <br><br>
            <div class="m-4 flex  text-green-400 text-4xl font-semibold underline">
                <h2>Affiliations de <span style="color:#fd1cb6; font-weight: bold "> {{ $user->first_name }} {{ $user->last_name }}</span></h2>
            </div>

            <table class="table table-head-bg-primary mt-4 table-responsive">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>

                </tr>
                </thead>
                <tbody>
                @forelse($user->downlines as $downline)
                    <tr >
                        <th >
                            {{$downline->id}}
                        </th>
                        <td >{{ $downline->first_name }}</td>
                        <td >{{ $downline->last_name }}</td>


                    </tr>
                @empty
                    <tr >
                        <td colspan="3">
                            Pas d'enregistrement
                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>

        </div>
    </div>
@endsection
