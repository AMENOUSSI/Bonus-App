
<x-app-layout>

    <div class="max-w-7xl">
        <h1 class="text-3xl font-bold mb-4 dark:text-white">Enrégistrer un nouveau produit</h1>
        <form action="{{ route('products.store') }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4 dark:bg-gray-700 dark:shadow-md  ">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2 dark:text-white">Nom du produit</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg p-2" >
                @error('name')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">

                <label for="description" class="block text-gray-700 font-bold mb-2 dark:text-white">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full border-gray-300 rounded-lg p-2" ></textarea>

            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2 dark:text-white">Prix Unitaire</label>
                <input type="number" name="price" id="price" class="w-full border-gray-300 rounded-lg p-2" >
                @error('price')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between">
                <a href="{{ route('products.index') }}" class="bg-orange-500 hover:bg-orange-700 rounded-md py-2 px-3 text-white text-xl">&leftarrow;</a>
                <button type="submit" class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded  dark:bg-blue-800 dark:hover:bg-blue-950">
                    Enregistrer
                </button>
            </div>

        </form>
    </div>
</x-app-layout>


