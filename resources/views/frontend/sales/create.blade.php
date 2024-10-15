
<x-app-layout>


    <div class="py-12">
        <h1 class="text-2xl font-bold mb-4 dark:text-white">Enregistrer une nouvelle vente</h1>

        <form method="POST" action="{{route('sales.store')}}" class="bg-white p-6 rounded shadow-md space-y-4 dark:bg-gray-700 dark:shadow-md">
            @csrf
            <div class="mb-4">
                <label for="user_id" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Choisir le proprietaire de l'achat</label>
                <select name="user_id" id="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="product_id" class="block mb-2 text-md font-medium text-gray-900 dark:text-white"> Choisir le produit paye</label>
                <select name="product_id" id="product_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">

                <label for="quantity" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Quantite Achete</label>
                <input type="number" name="quantity" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                @error('quantity')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>


            <div class="flex justify-between mb-6">
                <a href="{{ route('sales.index') }}" class="bg-orange-500 hover:bg-orange-700 rounded-md px-3 py-2 text-white text-xl">&leftarrow;</a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-3 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Enregister</button>

            </div>
        </form>

    </div>
</x-app-layout>

