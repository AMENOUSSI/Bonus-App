<x-app-layout>

    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8  mt-12 justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Les ventes</h1>
        <a href="{{ route('sales.create') }}" class="bg-orange-700 hover:bg-orange-800 text-md text-white flex items-center py-2 px-4 rounded-md">
            <svg class="w-6 h-6 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            Nouvelle vente
        </a>
    </div>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

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

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="bg-blue-800 text-gray-100 dark:bg-blue-900 dark:text-white">
                            <tr>
                                <th  scope="col" class="px-6 py-3 ">
                                    #
                                </th>


                                <th scope="col" class="px-6 py-3">
                                    Nom du Produit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Proprietaire d'achat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prix de l'unite
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Quantite
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date d'enregistrement
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prix Total
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($sales as $sale)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-orange-100">
                                        {{$sale->id}}
                                    </th>
                                    <td class="px-6 py-4 ">
                                        {{$sale->user->first_name}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$sale->product->name}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$sale->product->price}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$sale->quantity}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$sale->created_at}}
                                    </td>

                                    <th class="px-6 py-4 bg-emerald-400">
                                        {{$sale->total_price}}
                                    </th>
                                    <td class="py-2 px-4">

                                        <div class="flex ">
                                            <a href="{{ route('sales.edit', $sale) }}" class="text-green-400 hover:text-green-400 mr-4" title="Modifier">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                </svg>


                                            </a>
                                            <form id="delete-form-{{ $sale->id }}" action="{{ route('sales.destroy', $sale) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button class="text-red-500 hover:text-red-700 ml-2" title="Supprimer" onclick="confirmDelete({{ $sale->id }});">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="py-2 px-4" colspan="4">Aucun enregistrement trouvé</td>
                                </tr>

                            @endforelse


                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </div>
   <div class="justify-end">
       {{ $sales->links() }}
   </div>

    <script>
        function confirmDelete(saleId) {
            if (confirm("Are you sure you want to delete this sale?")) {
                document.getElementById('delete-form-' + saleId).submit();
            }
        }
    </script>

   {{-- <script>
        // Check for success message to display
        @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        @endif

        // Check for error message to display
        @if(session('error'))
        Swal.fire({
            title: 'Error!',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        @endif
    </script>--}}
</x-app-layout>












