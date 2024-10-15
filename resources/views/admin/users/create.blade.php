
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
                                            @error('first_name')
                                            <div id="alert-danger">{{ $message }}</div>
                                            @enderror
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
                                            @error('last_name')
                                            <div id="alert-danger">{{ $message }}</div>
                                            @enderror
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
                                            @error('identity_reference')
                                            <div id="alert-danger">{{ $message }}</div>
                                            @enderror
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
                                            @error('registration_number')
                                            <div id="alert-danger">{{ $message }}</div>
                                            @enderror
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
                                            @error('telephone')
                                            <div id="alert-danger">{{ $message }}</div>
                                            @enderror
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
                                            @error('email')
                                            <div id="alert-danger">{{ $message }}</div>
                                            @enderror
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

                                            <a href="{{ route('admin.users.index') }}"  class="btn btn-danger form-control">Cancel</a>
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
