<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Item Edit') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white-900 dark:text-gray-100">

                    @if (session('sattus'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url('item/edit') }}" class="max-w-sm mx-auto">
                        @csrf
                        <div class="mb-5">
                            <label for="Name"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item Name</label>
                            <input placeholder="{{ $item->item_name }}" readonly name="item_name" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                ><input type="hidden" name="id" value="{{ $item->id }}">
                        </div>
                        <div class="mb-5">
                            <label for="Details"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Details</label>
                            <input placeholder="{{ $item->item_details }}" readonly name="item_details" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                        </div>
                        <div class="mb-5">
                            <label for="Selling_Price"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Selling Price</label>
                            <input placeholder="{{ $item->item_sell_price }}" name="item_sell_price" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                        </div>
                        <div class="mb-5">
                            <label for="Buying_Price"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Buying Price</label>
                            <input placeholder="{{ $item->item_real_price }}" name="item_real_price" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                        </div>
                        <div class="mb-5">
                            <label for="Generic_Name"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Generic Name</label>
                            <input placeholder="{{ $item->item_generic_name }}" readonly name="item_generic_name" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                        </div>
                        <div class="mb-5">
                            <label for="Dealer_Name"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Dealer Name</label>
                            <input placeholder="{{ $item->item_dealer_name }}" name="item_dealer_name" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                        </div>
                        <div class="mb-5">
                            <label for="Company_Name"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Company Name</label>
                            <input placeholder="{{ $item->item_company_name }}" name="item_company_name" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                        </div>
                        <div class="mb-5">
                            <label for="Quantity"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Quantity Per Unit</label>
                            <input placeholder="{{ $item->item_quantity }}" name="item_quantity" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                        </div>
                        <div class="mb-5">
                            <label for="Strength"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Strength ( ml / mg )</label>
                            <input placeholder="{{ $item->item_strength }}" name="item_strength" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                        </div>
                        <div class="mb-5">
                            <label for="Stock"
                                class="block mb-2 text-sm font-medium text-white-900 dark:text-white">Item
                                Stock</label>
                            <input placeholder="{{ $item->item_stock }}" name="item_stock" type="text"
                                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                        </div>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Edit
                            Item</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
