

@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Update Sale</div>
                        </div>
                        <div class="card-body">

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

                            <form method="POST" action="{{ route('admin.sales.update',$sale) }}">
                                @csrf

                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="user_id" > User/Distrbuteur</label>
                                            <select name="user_id" id="user_id" class="form-control">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}" @if($sale->user_id == $user->id) selected @endif  >{{ $user->first_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_id">Choose Product</label>
                                            <select name="product_id" id="product_id" class="form-control">
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}" @if($sale->product_id == $product->id) selected @endif  >{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input
                                                type="number"
                                                name="quantity"
                                                class="form-control"
                                                id="quantity"
                                                value="{{ old('quantity', $sale->quantity) }}"
                                            />
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <!-- Vous pouvez ajouter d'autres champs ici -->

                                    </div>
                                    <div class="col-md-8 col-lg-4">
                                        <div class="card-action">
                                            <button type="submit" class="btn btn-success form-control mb-4">Update</button>
                                            <a  href="{{ route('admin.sales.index') }}" class="btn btn-danger form-control">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
