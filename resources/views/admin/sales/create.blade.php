
@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Ajouter une nouvelle vente</div>
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

                            <form method="POST" action="{{ route('admin.sales.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="user_id" >Choose User/Distrbuteur</label>
                                            <select name="user_id" id="user_id" class="form-control">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}"  >{{ $user->first_name }}</option>
                                                @endforeach

                                                @error('user_id')
                                                <div id="alert-danger">{{ $message }}</div>
                                                @enderror
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_id">Choose Product</label>
                                            <select name="product_id" id="product_id" class="form-control">
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}"  >{{ $product->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('product_id')
                                            <div id="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input
                                                type="number"
                                                name="quantity"
                                                class="form-control"
                                                id="quantity"
                                                placeholder="Enter quantity"
                                            />
                                            @error('quantity')
                                            <div id="alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-8 col-lg-4">
                                        <div class="card-action">
                                            <button type="submit" class="btn btn-success form-control mb-4">Save </button>

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
