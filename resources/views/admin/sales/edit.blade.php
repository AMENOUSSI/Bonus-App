{{--

<x-app-layout>


    <div class="py-12">
        <div class="pl-6 m-4">
            <a href="{{ route('sales.index') }}" class="bg-red-400 hover:bg-rose-500 text-white font-semibold py-2 px-4 rounded-2xl">Back to Sales List</a>

        </div>
        <div class="flex justify-center items-center mb-4">
            <h1 class="text-2xl font-bold">Add a Sale</h1>
        </div>
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-slate-900 rounded-lg" >
                        <form method="POST" action="{{route('sales.update',$sale)}}">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="user_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">User Name</label>
                                <select name="user_id" id="user_id" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if($sale->user_id == $user->id) selected @endif  >{{ $user->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="product_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white"> Choose a product</label>
                                <select name="product_id" id="product_id" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" @if($sale->product_id == $product->id)  selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">

                                <label for="quantity" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('quantity', $sale->quantity)}}">

                            </div>


                            <div class="mb-6">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>

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
