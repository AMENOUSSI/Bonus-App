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
                                            <a href="{{ route('sales.edit', $sale) }}" class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:bg-indigo-900 dark:hover:bg-primary-700 dark:focus:ring-primary-800" title="Modifier">
                                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>



                                            </a>
                                            @can('delete sale')
                                                <form id="delete-form-{{ $sale->id }}" action="{{ route('sales.destroy', $sale) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 ml-2" title="Supprimer" onclick="confirmDelete({{ $sale->id }});">
                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            @endcan
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












