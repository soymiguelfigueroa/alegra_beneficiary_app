<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('order.store') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label 
                                for="quantity"
                                class="block text-gray-700 text-sm font-bold mb-2"
                            >{{ __('Quantity') }}</label>
                            <input 
                                type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="quantity"
                                value="1"
                                required>
                        </div>
                        <button 
                            type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >{{ __('Create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
