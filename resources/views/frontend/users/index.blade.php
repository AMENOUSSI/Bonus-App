<x-app-layout>

    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8 mt-12 justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Page des Distributeurs & Filleuls</h1>
        <a href="{{ route('users.create') }}" class="inline-flex items-center px-3 py-2 mb-4 text-sm font-medium text-center text-white rounded-lg bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
            <svg class="w-6 h-6 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            Ajouter
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
                                    ID
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Nom
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prenom
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Numero Identite Reference
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Matricule
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telephone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Parain / Sponsor
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-orange-100">
                                        {{$user->id}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$user->first_name}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$user->last_name}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$user->identity_reference}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$user->registration_number}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$user->telephone ? : 'Non Specifie'}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$user->email}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$user->sponsor ? $user->sponsor->first_name . ' ' . $user->sponsor->last_name : 'No Sponsor'}}
                                    </td>

                                    <td class="py-2 px-4 flex">

                                        <div class="flex  justify-evenly">

                                                <a href="{{ route('users.edit', $user) }}" class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:ring-primary-300 dark:bg-indigo-900 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>

                                                </a>



                                            <a href="{{ route('users.show', ['user' => $user->id]) }} " class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:ring-primary-300 dark:bg-indigo-900 dark:hover:bg-orange-700 dark:focus:ring-primary-800 ml-2">
                                                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>


                                            </a>


                                                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 ml-2" title="Supprimer" onclick="confirmDelete({{ $user->id }});">
                                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>


                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <td class="px-6 py-4 " colspan="9">
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

   <div class="justify-end">
       {{ $users->links() }}
   </div>

    <script>
        function confirmDelete(userId) {
            if (confirm("Etes-vous sur de vouloir supprimer ce distributeur ?")) {
                document.getElementById('delete-form-' + userId).submit();
            }
        }
    </script>

    {{--<script>
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











