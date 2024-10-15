
@extends('layouts.admin.main')

@section('content')
    <div class="card">

        <div class="card-body">
            <div class="table-responsive" id="main">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Les bonus</div>
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
                    <th scope="col">Bonus Amount (FCFA)</th>

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
                            {{$user->bonus }}
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

