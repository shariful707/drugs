<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order List') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <table class="w-full text-white-500 dark:text-gray-400">
                        <thead
                            class=" font-medium text-white-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    SL
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Total Sale
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Total Stock
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sale_lists as $sale_list)
                                <tr>
                                    <th scope="row" class="px-6 py-4 font-medium text-white-900 whitespace-nowrap">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ App\Models\Item::find($sale_list->item_id)->item_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $sale_list->item_count }}
                                        {{-- {{ App\Models\Order::find($single_order->order_id)->total }}$ --}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ App\Models\Item::find($sale_list->item_id)->item_stock }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Order to show</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
