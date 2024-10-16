@extends('layouts.admin.main')

@section('content')
    <section class="hero bg-info text-white">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h1 class="display-4">Bienvenue sur LWP Light World Promotion en tant que , <strong style="color: #b31389">{{ $user->first_name }} </strong>!!!</h1>
                    <p class="lead mb-4">
                        LWP Light World Promotion est une plateforme dédiée à [Insérer une brève description engageante ici]. Profitez de nombreux avantages tels que [mentionner les avantages principaux].
                    </p>
                    <a href="#" class="btn btn-light btn-lg">En savoir plus</a>
                </div>

            </div>
        </div>
    </section>
@endsection
