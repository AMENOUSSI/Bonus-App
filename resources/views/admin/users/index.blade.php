<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Page') }}
        </h2>
    </x-slot>
    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8  mt-12 justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">List of Users</h1>
        <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-3xl">Add New User</a>
    </div>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-100 uppercase bg-blue-400 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th  scope="col" class="px-6 py-3 ">
                                    ID
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    First Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Last Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Reference Identity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Registration Number
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telephone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sponsor
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-black text-sm">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-orange-100">
                                        {{$user->id}}
                                    </th>
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
                                        {{$user->telephone}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$user->email}}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        {{$user->sponsor ? $user->sponsor->first_name . ' ' . $user->sponsor->last_name : 'No Sponsor'}}
                                    </td>

                                    <td class="py-2 px-4 flex">

                                        <div class="flex  justify-evenly">

                                            <a href="{{ route('users.show', ['user' => $user->id]) }} " class="text-orange-500 hover:text-orange-700 ml-2 text-4xl">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>


                                            </a>

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
</x-app-layout>












