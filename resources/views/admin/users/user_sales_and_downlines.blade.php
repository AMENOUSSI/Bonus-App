
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <h2>Achats de {{ $user->first_name }} {{ $user->last_name }}</h2>
                        <table>
                            <thead>
                            <tr>
                                <th>Nom du Produit</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>
                                <th>Prix Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->product->name }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                    <td>{{ $sale->unit_price }}</td>
                                    <td>{{ $sale->total_price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <h2>Affiliations de {{ $user->first_name }} {{ $user->last_name }}</h2>
                        <ul>
                            @foreach ($downlines as $downline)
                                <li>{{ $downline->first_name }} {{ $downline->last_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

