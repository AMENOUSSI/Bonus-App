{{--

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="pl-6 m-4">
            <a href="{{ route('products.index') }}" class="bg-red-400 hover:bg-rose-500 text-white font-semibold py-2 px-4 rounded-lg">Back to Product List</a>

        </div>
        <div class="flex justify-center items-center mb-4">
            <h1 class="text-2xl font-bold">Edit Product</h1>
        </div>
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-slate-900 rounded-lg" >
                        <form method="POST" action="{{route('products.update', $product)}}">

                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('name', $product->name)}}">
                            </div>
                            <div class="mb-4">

                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{old('name', $product->description)}}</textarea>

                            </div>
                            <div class="mb-4">
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('name', $product->price)}}">
                            </div>

                            <div class="mb-6">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Store</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


--}}
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
