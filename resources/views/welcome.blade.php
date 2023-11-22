@section('title', 'Home | Pritom Drug Store')
<x-guest-layout>
    <div class="dummy">
        <img src="../image/dummy.png" alt="">
    </div>
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
                  </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <th>{{ $loop->index + 1 }}</th>
                        <th >
                            {{ $item->item_name }}
                        </th>
                        <td >
                            {{ $item->item_details }}
                        </td>
                        <td >
                            {{ $item->item_company_name }}
                        </td>
                        <td >
                            {{ $item->item_generic_name }}
                        </td>
                        <td >
                            {{ $item->item_strength }}
                            @if ($item->item_type == 'liquid' )
                            ml
                            @endif
                            @if ($item->item_type == 'tablet' )
                            mg
                            @endif
                        </td>
                        <td >
                            {{ $item->item_sell_price }}
                        </td>
                        <td >
                            {{ $item->item_quantity }}
                        </td>
                        <td >
                            {{ $item->item_stock }}
                        </td>
                        <td >
                            @if ($item->item_stock < 1)
                            <a class="btn btn-warning btn-sm" disabled>Stock Out</a>
                            @else
                            <a href="{{ url('item/order') }}/{{ $item->id }}" class="btn btn-success btn-sm">Order</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</x-guest-layout>
