<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Request List') }}
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
                                    Item name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Details
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Type
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Company Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Quantity
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Strength
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Stock
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Item Stock Request
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User Contact
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    User Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <th scope="row"
                                    class="px-6 py-4 font-medium text-white-900 whitespace-nowrap">
                                    {{ App\Models\Item::find($item->item_id)->item_name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ App\Models\Item::find($item->item_id)->item_details }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ App\Models\Item::find($item->item_id)->item_type }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ App\Models\Item::find($item->item_id)->item_company_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ App\Models\Item::find($item->item_id)->item_quantity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ App\Models\Item::find($item->item_id)->item_strength }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ App\Models\Item::find($item->item_id)->item_stock }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->item_quantity }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->user_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->user_address }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->user_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->user_email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ url('/item/view') }}/{{ $item->item_id }}" class="btn btn-danger btn-sm">Accept</a>
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
