{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="pl-6 m-4">
            <a href="{{ route('products.index') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg">Back to Product List</a>
        </div>
        <div class="flex justify-center items-center mb-4">
            <h1 class="text-2xl font-bold">Add a User</h1>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto p-4 bg-slate-200 dark:bg-slate-900 rounded-lg">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="flex flex-wrap -mx-2">
                                <!-- Colonne 1 -->
                                <div class="w-full md:w-1/2 px-2">
                                    <div class="mb-4">
                                        <label for="first_name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('first_name')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="identity_reference" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Reference Identity</label>
                                        <input type="text" name="identity_reference" id="identity_reference" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('identity_reference')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="telephone" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Telephone</label>
                                        <input type="text" name="telephone" id="telephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('telephone')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Colonne 2 -->
                                <div class="w-full md:w-1/2 px-2">
                                    <div class="mb-4">
                                        <label for="last_name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('last_name')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="registration_number" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Registration Number</label>
                                        <input type="text" name="registration_number" id="registration_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('registration_number')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('email')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="sponsor_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Sponsor</label>
                                        <select name="sponsor_id" id="sponsor_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}"  >{{ $user->first_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('sponsor_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Store</button>
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
                            <div class="card-title">Add New User/Distributor</div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.users.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input
                                                type="text"
                                                name="first_name"
                                                class="form-control"
                                                id="first_name"
                                                placeholder="Enter first name"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input
                                                type="text"
                                                name="last_name"
                                                class="form-control"
                                                id="last_name"
                                                placeholder="Enter last name"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <label for="identity_reference">Reference Identity</label>
                                            <input
                                                type="text"
                                                name="identity_reference"
                                                class="form-control"
                                                id="identity_reference"
                                                placeholder="Identity"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <label for="registration_number">Registration Number</label>
                                            <input
                                                type="text"
                                                name="registration_number"
                                                class="form-control"
                                                id="registration_number"
                                                placeholder="Enter registration number"
                                            />
                                        </div>



                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <!-- Vous pouvez ajouter d'autres champs ici -->
                                        <div class="form-group">
                                            <label for="telephone">Telephone</label>
                                            <input
                                                type="text"
                                                name="telephone"
                                                class="form-control"
                                                id="telephone"
                                                placeholder="Enter telephone"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input
                                                type="text"
                                                name="email"
                                                class="form-control"
                                                id="email"
                                                placeholder="Enter email"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <label for="sponsor_id" >Sponsor</label>
                                            <select name="sponsor_id" id="sponsor_id" class="form-control">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}"  >{{ $user->first_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sponsor_id')
                                            <div class="btn btn-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

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
