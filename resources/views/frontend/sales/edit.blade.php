
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Page de modifications d'une vente") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <form method="POST" action="{{route('sales.update', $sale)}}" class="bg-white p-6 rounded shadow-md space-y-4 dark:bg-gray-700 dark:shadow-md">

            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="user_id" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Le Proprietaire de l'achat</label>
                <select name="user_id" id="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($users as $user)
                        <option value="{{ $user->sponsor_id }}"  >{{ $user->first_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="product_id" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Le Produit achete</label>
                <select name="product_id" id="product_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($products as $product)
                        <option value="{{ $product->product_id }}"  >{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 mb-2 dark:text-white">Quantite Paye</label>
                <input type="number" name="quantity" id="quantity" class="w-full border-gray-300 rounded-lg p-2" value="{{old('name', $sale->quantity)}}">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('sales.index') }}" class="bg-orange-500 hover:bg-orange-700 rounded-md py-2 px-3 text-white text-xl">&leftarrow;</a>
                <button type="submit" class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded dark:bg-blue-800 dark:hover:bg-blue-950">
                    Modifier
                </button>
            </div>
        </form>

    </div>
</x-app-layout>

