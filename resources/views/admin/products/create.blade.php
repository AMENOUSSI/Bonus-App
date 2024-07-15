@extends('layouts.admin.main')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary" id="back">Retour</a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add New Product</div>
                        </div>
                        <div class="card-body">

                            @if(session('success'))
                                <div class="btn btn-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="btn btn-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('admin.products.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Designation/Article</label>
                                            <input
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                id="name"
                                                placeholder="Enter Product name"
                                            />
                                            @error('name')
                                            <div id="alert-danger" >{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea
                                                rows="2"
                                                class="form-control"
                                                id="description"
                                                name="description"
                                                placeholder="Add something..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Unit Price</label>
                                            <input
                                                type="number"
                                                name="price"
                                                class="form-control"
                                                id="price"
                                                placeholder="Product Price"
                                            />
                                            @error('price')
                                            <div id="alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success form-control mb-4">Save</button>
                                            <a href="{{ route('admin.products.index') }}" type="button" class="btn btn-danger form-control">Cancel</a>
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
