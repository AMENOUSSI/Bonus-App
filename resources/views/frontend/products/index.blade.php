<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Page des Produits') }}
        </h2>
    </x-slot>

    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12 justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Liste des Produits</h1>
        <a href="{{ route('products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">
             Ajouter
        </a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-200 border-green-600 border-l-4 p-4 mb-4">
                    <p class="text-green-600">{{ session('success') }}</p>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-200 border-red-600 border-l-4 p-4 mb-4">
                    <p class="text-red-600">{{ session('error') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-100 uppercase bg-blue-400 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Nom du Produit</th>
                                <th scope="col" class="px-6 py-3">Description</th>
                                <th scope="col" class="px-6 py-3">Prix Unitaire</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-orange-100">{{ $product->id }}</td>
                                    <td class="px-6 py-4">{{ $product->name }}</td>
                                    <td class="px-6 py-4">{{ $product->description }}</td>
                                    <td class="px-6 py-4">{{ $product->price }}</td>
                                    <td class="py-2 px-4">
                                        <div class="flex">
                                            <a href="{{ route('products.edit', $product) }}" class="text-green-400 hover:text-green-400 mr-4" title="Modifier">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                            <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button class="text-red-500 hover:text-red-700 ml-2" title="Supprimer" onclick="confirmDelete({{ $product->id }});">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>


                                </tr>
                            @empty
                                <tr class="bg-black border-b dark:bg-gray-800 dark:border-gray-700 text-white text-sm">
                                    <td class="px-6 py-4 " colspan="5">No product yet !</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="justify-end">
            {{ $products->links() }}
        </div>
    </div>

    <script>
        function confirmDelete(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                document.getElementById('delete-form-' + productId).submit();
            }
        }
    </script>

    {{--<script>
        // Fonction pour confirmer la suppression
        function confirmDelete(productId) {
            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Cette action est irréversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Soumettre le formulaire de suppression
                    document.getElementById('delete-form-' + productId).submit();
                }
            })
        }

        // Afficher le message de succès après une suppression
        @if(session('success-delete'))
        Swal.fire({
            title: 'Suppression réussie!',
            text: '{{ session('success-delete') }}',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        @endif

        // Afficher le message d'erreur après une suppression
        @if(session('error-delete'))
        Swal.fire({
            title: 'Erreur!',
            text: '{{ session('error-delete') }}',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        @endif
    </script>--}}
</x-app-layout>
