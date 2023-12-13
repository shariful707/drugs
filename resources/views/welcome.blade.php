@section('title', 'Home | Pritom Drug Store')
<x-guest-layout>
    <style>
        .temp {
            align-items: center;
        }
    </style>
    <div class="dummy">
        <img src="../image/dummy.png" alt="">
    </div>

    <script src="script.js"></script>
    <div>
        <form action="">
            <input type="text" name="search" placeholder="search" value="{{ $search }}">
            <select name="filter" id="type"
                class="bg-gray-50 border border-gray-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="0" @if ($filter == '') selected @endif>Choose a Type</option>

                <option @if ($filter == 'tablet') selected @endif value="tablet">Tablet/Capsule</option>
                <option @if ($filter == 'liquid') selected @endif value="liquid">Liquid</option>
            </select>
            <button>Search / Filter</button>
        </form>
    </div>
    <div class="temp">
        <div class="row">
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Comapny Name</th>
                            <th scope="col">Generic Name</th>
                            <th scope="col">Strength</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity Per Unit</th>
                            <th scope="col">Total Stock</th>
                            <th scope="col">Action</th>
                            <th scope="col">Review</th>
                            <th scope="col">Wislist</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <th>
                                    {{ $item->item_name }}
                                </th>
                                <td>
                                    {{ $item->item_details }}
                                </td>
                                <td>
                                    {{ $item->item_company_name }}
                                </td>
                                <td>
                                    {{ $item->item_generic_name }}
                                </td>
                                <td>
                                    {{ $item->item_strength }}
                                    @if ($item->item_type == 'liquid')
                                        ml
                                    @endif
                                    @if ($item->item_type == 'tablet')
                                        mg
                                    @endif
                                </td>
                                <td>
                                    {{ $item->item_sell_price }}
                                </td>
                                <td>
                                    {{ $item->item_quantity }}
                                </td>
                                <td>
                                    {{ $item->item_stock }}
                                </td>
                                <td>
                                    {{ $item->item_stock }}
                                    @if ($item->item_stock < 1)
                                        <a class="btn btn-warning btn-sm" disabled>Stock Out</a>
                                        <a href="{{ url('request_item') }}/{{ $item->id }}"
                                            class="mt-1 btn btn-success btn-sm">Request Order</a>
                                    @else
                                        <!------------------- submit form added ------------------------------>


                                        <form method="Post" action="{{ url('item/order') }}/{{ $item->id }}">
                                            @csrf


                                            <label for="quantity">Quantity:</label>
                                            <input type="number" value="1" min="1" max="5"
                                                class="quantity-input" name="quantity">

                                            <!-- submit button -->
                                            <button type="submit">Submit</button>
                                        </form>
                                    @endif
                                    <a href="{{ url('review') }}/{{ $item->id }}"
                                        class="mt-1 btn btn-success btn-sm">Review</a>
                                </td>
                                <td>
                                    <a href="{{ url('review/show') }}/{{ $item->id }}"
                                        class="mt-1 btn btn-success btn-sm">See Review</a>
                                </td>
                                <td>
                                    <a href="{{ url('add_wishlist') }}/{{ $item->id }}"
                                        class="mt-1 btn btn-success btn-sm">Add to Wishlist</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-guest-layout>
