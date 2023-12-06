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
                                    User Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Phone
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Address
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Give Orders
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_billing_details as $order_billing_detail)
                                <tr>
                                    <th scope="row"
                                    class="px-6 py-4 font-medium text-white-900 whitespace-nowrap">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $order_billing_detail->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $order_billing_detail->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $order_billing_detail->phone }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $order_billing_detail->address }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ App\Models\Order_Billing_Detail::where('name','=',$order_billing_detail->name)->count() }}
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
