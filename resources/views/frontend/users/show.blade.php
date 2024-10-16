

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

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="m-4 flex justify-center text-2xl font-semibold">
                            <h1 class="text-red-500">Détails de l'utilisateur : </h1>
                            <p class="text-black ml-3">{{ $user->first_name }} {{ $user->last_name }}</p>
                        </div>

                        <div class="flex justify-center text-black font-bold text-4xl m-4 ">
                            <h2>Achats</h2>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-100 uppercase bg-blue-800 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th  scope="col" class="px-6 py-3 ">
                                    ID
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Produit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantité
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prix unitaire
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prix total
                                </th>



                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($user->sales as $sale)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-orange-100">
                                        {{$sale->id}}
                                    </th>
                                    <td class="px-6 py-4 ">{{ $sale->product->name }}</td>
                                    <td class="px-6 py-4 ">{{ $sale->quantity }}</td>
                                    <td class="px-6 py-4 ">{{ $sale->product->price }}</td>
                                    <td class="px-6 py-4 ">{{ $sale->total_price }}</td>

                                    <td class="py-6 px-4">

                                        <div class="">


                                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 ml-2" title="Supprimer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>

                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <td class="px-6 py-4 " colspan="6">
                                        Pas d'enregistrement
                                    </td>
                                </tr>

                            @endforelse

                            </tbody>
                        </table>
                        <br><br>
                        <div class="m-4 flex justify-center text-green-400 text-4xl font-semibold ">
                            <h2>Liste des affilies</h2>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-100 uppercase bg-blue-800 dark:bg-gray-700 dark:text-gray-400">
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
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($user->downlines as $downline)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-orange-100">
                                        {{$downline->id}}
                                    </th>
                                    <td class="px-6 py-4 ">{{ $downline->first_name }}</td>
                                    <td class="px-6 py-4 ">{{ $downline->last_name }}</td>

                                </tr>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <td class="px-6 py-4 " colspan="3">
                                        Pas d'enregistrement
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

