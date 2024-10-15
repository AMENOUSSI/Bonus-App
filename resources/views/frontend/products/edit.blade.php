
<x-app-layout>


    <div class="max-w-7xl">
        <div class="flex justify-start">

            <div class="flex justify-center items-center mb-4">
                <h1 class="text-2xl font-bold">Modifier les info sur un Produit</h1>
            </div>
        </div>
        <form method="POST" action="{{route('products.update', $product)}}" class="bg-white p-6 rounded shadow-md space-y-4 dark:bg-gray-700 dark:shadow-md">

            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2 dark:text-white">Nom du Produit</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg p-2" value="{{old('name', $product->name)}}">
            </div>
            <div class="mb-4">

                <label for="description" class="block text-gray-700 font-bold mb-2 dark:text-white">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full border-gray-300 rounded-lg p-2" >{{old('name', $product->description)}}</textarea>

            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2 dark:text-white">Prix du Produit</label>
                <input type="text" name="price" id="price" class="w-full border-gray-300 rounded-lg p-2" value="{{old('name', $product->price)}}">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('products.index') }}" class="bg-orange-500 hover:bg-orange-700 rounded-md py-2 px-3 text-white text-xl">&leftarrow;</a>
                <button type="submit" class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded dark:hover:bg-blue-600 dark:bg-blue-800 dark:hover:bg-blue-950">
                    Modifier
                </button>
            </div>
        </form>

    </div>
</x-app-layout>


