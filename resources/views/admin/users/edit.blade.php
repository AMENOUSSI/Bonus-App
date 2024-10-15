
@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Modifier Infos Distributeur</div>
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

                            <form method="POST" action="{{ route('admin.users.update',$user) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="first_name">Nom</label>
                                            <input
                                                type="text"
                                                name="first_name"
                                                class="form-control"
                                                id="first_name"
                                                value="{{old('first_name', $user->first_name)}}"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <label for="last_name">Prenom</label>
                                            <input
                                                type="text"
                                                name="last_name"
                                                class="form-control"
                                                id="last_name"
                                                value="{{old('first_name', $user->last_name)}}"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <label for="identity_reference">Numero de la Piece D'Identite</label>
                                            <input
                                                type="text"
                                                name="identity_reference"
                                                class="form-control"
                                                id="identity_reference"
                                                value="{{old('first_name', $user->identity_reference)}}"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <label for="registration_number">Matricule</label>
                                            <input
                                                type="text"
                                                name="registration_number"
                                                class="form-control"
                                                id="registration_number"
                                                value="{{old('first_name', $user->registration_number)}}"
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
                                                value="{{old('first_name', $user->telephone)}}"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input
                                                type="text"
                                                name="email"
                                                class="form-control"
                                                id="email"
                                                value="{{old('first_name', $user->email)}}"
                                            />
                                        </div>

                                        <div class="form-group">
                                            <label for="sponsor_id" >Parain / Sponsor</label>
                                            <select name="sponsor_id" id="sponsor_id" class="form-control">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}"   >{{ $user->first_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sponsor_id')
                                            <div class="btn btn-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-8 col-lg-4">
                                        <div class="card-action">
                                            <button type="submit" class="btn btn-success form-control mb-4">Update</button>

                                            <a href="{{ route('admin.users.index') }}" type="button" class="btn btn-danger form-control">Cancel</a>
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

