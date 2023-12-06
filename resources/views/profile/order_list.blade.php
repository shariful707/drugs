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
                                    Pyment Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Bill
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Order Item
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Order Added At
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Auth::user()->role == 1)
                                @forelse ($orders as $order)
                                    <tr>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-white-900 whitespace-nowrap">
                                            {{ $loop->index + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            @if ($order->payment_status == 2)
                                                Cash on delivery
                                            @else
                                                Online Payment
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $order->total }}$
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ url('/order_list/items') }}/{{ $order->id }}">{{ App\Models\Order_Detail::where('order_id', '=', $order->id)->count() }}
                                                Items</a>

                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ url('/order_list/details') }}/{{ $order->id }}"
                                                class="btn btn-danger btn-sm">View Billing Details</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $order->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Order to show</td>
                                    </tr>
                                @endforelse
                            @else
                                @forelse ($single_orders as $single_order)
                                    <tr>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-white-900 whitespace-nowrap">
                                            {{ $loop->index + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            @if (App\Models\Order::find($single_order->order_id)->payment_status == 2)
                                                Cash on delivery
                                            @else
                                                Online Payment
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ App\Models\Order::find($single_order->order_id)->total }}$
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ url('/order_list/items') }}/{{ $single_order->order_id }}">{{ App\Models\Order_Detail::where('order_id', '=', $single_order->order_id)->count() }}
                                                Items</a>

                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ url('/order_list/details') }}/{{ $single_order->order_id }}"
                                                class="btn btn-danger btn-sm">View Billing Details</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $single_order->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">No Order to show</td>
                                        </tr>
                                    @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </x-app-layout>
