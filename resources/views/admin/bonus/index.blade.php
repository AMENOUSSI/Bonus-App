{{--

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bonus Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-100 uppercase bg-blue-400 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th  scope="col" class="px-6 py-3 ">
                                    ID
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Nom
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prenom
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telephone
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Bonus
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-orange-100">
                                        {{$user->id}}
                                    </th>
                                    <td>{{ $user->first_name }} </td>

                                    <td class="px-6 py-4">
                                        {{ $user->last_name }}
                                    </td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">{{ $user->telephone }}</td>
                                    <th class="px-6 py-4 bg-rose-300">
                                        {{$user->bonus}}
                                    </th>
                                </tr>
                            @empty
                                <tr class="bg-black border-b dark:bg-gray-800 dark:border-gray-700 text-white text-sm">
                                    <td class="px-6 py-4 " colspan="6">
                                        No bonus yet !
                                    </td>
                                </tr>
                            @endforelse



                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
--}}


@extends('layouts.admin.main')

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="table-responsive" id="main">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Bonuses Page</div>
                </div>
            </div>
            <table class="table table-head-bg-secondary table-responsive" >
                <thead >
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Bonus Amount</th>

                </tr>
                </thead >
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td> {{$user->id}}</td>
                        <td>{{ $user->first_name }} </td>

                        <td>
                            {{ $user->last_name }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telephone }}</td>
                        <th style="font-size:large; color: #d63384; "  >
                            {{$user->bonus }}  (F CFA)
                        </th>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            No bonus found yet !
                        </td>
                    </tr>
                @endforelse


                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection

