
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Page d'enregistrement d'une ventes") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="pl-6 m-4">
            <a href="{{ route('sales.index') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-2xl">Retour</a>

        </div>
        <div class="flex justify-center items-center mb-4">
            <h1 class="text-2xl font-bold">Ajouter une Vente</h1>
        </div>
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-slate-900 rounded-lg" >
                        <form method="POST" action="{{route('sales.store')}}">
                            @csrf
                            <div class="mb-4">
                                <label for="user_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Nom de l'acheteur</label>
                                <input list="users_list" id="user_id" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <datalist id="users_list">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                                    @endforeach
                                </datalist>
                                @error('user_id')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="product_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white"> Choisir le produit paye</label>
                                <input list="products_list" id="product_id" name="product_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                <datalist id="products_list">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </datalist>
                                @error('product_id')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">

                                <label for="quantity" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Quantite Achete</label>
                                <input type="number" name="quantity" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                @error('quantity')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-6">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Enregister</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

