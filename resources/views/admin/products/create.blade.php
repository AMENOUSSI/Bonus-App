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
                                        </div>



                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <!-- Vous pouvez ajouter d'autres champs ici -->

                                    </div>
                                    <div class="col-md-8 col-lg-4">
                                        <div class="card-action">
                                            <button type="submit" class="btn btn-success form-control mb-4">Save </button>
{{--
                                            <button type="submit" class="btn btn-primary form-control mb-4">Save and Edit</button>
--}}
                                            <button type="button" class="btn btn-danger form-control">Cancel</button>
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
