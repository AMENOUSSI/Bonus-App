
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Page de modifications d'une vente") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="pl-6 m-4">
            <a href="{{ route('sales.index') }}" class="bg-red-400 hover:bg-rose-500 text-white font-semibold py-2 px-4 rounded-2xl">Back to Sales List</a>

        </div>
        <div class="flex justify-center items-center mb-4">
            <h1 class="text-2xl font-bold">Add a Sale</h1>
        </div>
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto p-4 bg-slate-200 dark:bg-slate-900 rounded-lg" >
                        <form method="POST" action="{{route('sales.update',$sale)}}">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="user_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">User Name</label>
                                <select name="user_id" id="user_id" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if($sale->user_id == $user->id) selected @endif  >{{ $user->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="product_id" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white"> Choose a product</label>
                                <select name="product_id" id="product_id" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" @if($sale->product_id == $product->id)  selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">

                                <label for="quantity" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('quantity', $sale->quantity)}}">

                            </div>


                            <div class="mb-6">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

