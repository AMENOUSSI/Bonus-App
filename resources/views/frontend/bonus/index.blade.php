
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Page des Bonus') }}
        </h2>
    </x-slot>
    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8  mt-12 justify-center items-center mb-4">
        <h1 class="text-2xl font-bold">Page de differents bonus calcules pour chaque Distributeur</h1>

    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telephone
                                </th>

                                <th scope="col" class="px-6 py-3">
                                     Bonus gagne (FCFA)
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-orange-100">
                                        {{$user->id}}
                                    </td >
                                    <td class="px-6 py-4">{{ $user->first_name }} </td>

                                    <td class="px-6 py-4">
                                        {{ $user->last_name }}
                                    </td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">{{ $user->telephone }}</td>
                                    <th class="px-6 py-4 bg-rose-200">
                                        {{$user->bonus}}
                                    </th>
                                </tr>
                            @empty
                                <tr class="bg-black border-b dark:bg-gray-800 dark:border-gray-700 text-white text-sm">
                                    <td class="px-6 py-4 " colspan="6">
                                        No bonus yet !
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
