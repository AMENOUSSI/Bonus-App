<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8  mt-12 justify-between items-center mb-4">

        <a href="{{ route('users.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md">Retour</a>
        <h1 class="text-2xl font-bold">Page d'ajout d'un nouveau Distributeur</h1>
    </div>

    <div class="py-12">


        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="max-w-7xl mx-auto p-4 bg-slate-200 dark:bg-slate-900 rounded-lg">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="flex flex-wrap -mx-2">
                                <!-- Colonne 1 -->
                                <div class="w-full md:w-1/2 px-2">
                                    <div class="mb-4">
                                        <label for="first_name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">First Name</label>
                                        <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('first_name')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="identity_reference" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Reference Identity</label>
                                        <input type="text" name="identity_reference" id="identity_reference" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('identity_reference')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="telephone" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Telephone</label>
                                        <input type="text" name="telephone" id="telephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('telephone')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Colonne 2 -->
                                <div class="w-full md:w-1/2 px-2">
                                    <div class="mb-4">
                                        <label for="last_name" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('last_name')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="registration_number" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Registration Number</label>
                                        <input type="text" name="registration_number" id="registration_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('registration_number')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @error('email')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="sponsor_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Sponsor</label>
                                        <select name="sponsor_id" id="sponsor_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}"  >{{ $user->first_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('sponsor_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-6">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs[10] px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
