<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Item List') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <table class="w-full text-white-500 dark:text-gray-400">
                        <thead
                            class="font-medium text-white-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Item Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Item Price
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Item Quantity
                                </th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Order At
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_items as $order_item)
                                <tr>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-white-900 whitespace-nowrap text-center">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{ $order_item->item_name }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $order_item->item_price }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $order_item->item_quantity }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $order_item->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
