
@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add New Product</div>
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

                            <form method="POST" action="{{ route('admin.products.update',$product) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Designation/Article</label>
                                            <input
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                id="name"
                                                placeholder=""
                                                value="{{old('name', $product->name)}}"
                                            />
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea
                                                rows="2"
                                                class="form-control"
                                                id="description"
                                                name="description"
                                                >{{old('description', $product->description)}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Unit Price</label>
                                            <input
                                                type="number"
                                                name="price"
                                                class="form-control"
                                                id="price"
                                                value="{{old('name', $product->price)}}"
                                            />
                                        </div>



                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <!-- Vous pouvez ajouter d'autres champs ici -->

                                    </div>
                                    <div class="col-md-8 col-lg-4">
                                        <div class="card-action">
                                            <button type="submit" class="btn btn-success form-control mb-4">Update</button>

                                            <a  href="{{ route('admin.products.index') }}" class="btn btn-danger form-control">Cancel</a>                                        </div>
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
