<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="pl-6 m-4">
            <a href="{{ route('users.index') }}" class="bg-red-400 hover:bg-rose-500 text-white font-semibold py-2 px-4 rounded-lg text-2xl">
                &leftarrow;
            </a>
        </div>
        <div class="flex justify-center items-center mb-4">
            <h1 class="text-2xl font-bold">Modifier les informations d'un Distributeurs</h1>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('users.update',$user) }}" class="bg-white p-6 rounded shadow-md space-y-4 dark:bg-gray-700 dark:shadow-md">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap -mx-2">
                    <!-- Colonne 1 -->
                    <div class="w-full md:w-1/2 px-2">
                        <div class="mb-4">
                            <label for="first_name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Nom</label>
                            <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('first_name', $user->first_name)}}">
                        </div>
                        <div class="mb-4">
                            <label for="identity_reference" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Numero Identite Reference</label>
                            <input type="text" name="identity_reference" id="identity_reference" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('identity_reference', $user->identity_reference) }}">
                        </div>
                        <div class="mb-4">
                            <label for="telephone" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Telephone</label>
                            <input type="text" name="telephone" id="telephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('telephone', $user->telephone) }}">
                        </div>
                    </div>
                    <!-- Colonne 2 -->
                    <div class="w-full md:w-1/2 px-2">
                        <div class="mb-4">
                            <label for="last_name" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('last_name', $user->last_name) }}">
                        </div>
                        <div class="mb-4">
                            <label for="registration_number" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Matricule</label>
                            <input type="text" name="registration_number" id="registration_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('registration_number', $user->registration_number) }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="mb-4">
                            <label for="sponsor_id" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Distributeur / Sponsor</label>
                            <select name="sponsor_id" id="sponsor_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($users as $user)
                                    <option value="{{ $user->sponsor_id }}"  >{{ $user->first_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="mb-6">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Modifier</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
