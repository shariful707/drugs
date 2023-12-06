@section('title', 'Cart | Pritom Drug Store')
<x-guest-layout>
    <head>
        <title>Cart | Pritom Drug Store</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }


            header {
                background-color: #333;
                color: white;
                text-align: center;
                padding: 1em;
            }
            h3{

                color: black;
                text-align: center;
                padding: 0.5em;


            }

            .cart-container {
                max-width: 800px;
                margin: 20px auto;
                background-color: rgb(255, 255, 255);
                padding: 20px;
                border-radius: 20px;
                box-shadow: 0 0 80px rgba(0, 0, 0, 0.1);
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            th, td {
                padding: 15px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            .header_cont{
                background-color: #333;


            }



            .quantity-input {
                width: 40px;
            }

            .action-btn {
                background-color: #FF0000;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                text-align: center;
            }


            .action-btn:hover {
                background-color: #8B0000;
            }
            .action-btnApply{
                background-color: orange;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                text-align: center;

            }
            .action-btnApply:hover{
                background-color: orangered;


            }

            .checkout-btn{
                background-color:#008000;
                color: white;
                padding: 8px 12px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .checkout-btn:hover{
                background-color:#013220;

            }
            .payment{
                text-align: center;

            }
            .t_sum{

                text-align: center;

            }
            .t_sumcontainer{
                max-width: 300px;
                margin: 20px auto;
                text-align: center;

            }



        </style>
    </head>

    <body>
        <header>
            <h1>Shopping Cart</h1>
        </header>

        <!-- CART DETAILS SECTION -->
        <div class="cart-container">
            <table>
                <thead>
                    <tr class="header-cont">
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    <!-- Sample Product Row -->
                    <?php $totalprice=0; ?>


                    @forelse($cart as $cart)
                    <tr>
                        <?php $t_price=0; ?>
                        <td>{{$cart->item_name}}</td>
                        <td>{{$cart->item_quantity}}</td>
                        <td>{{$cart->item_price}}</td>
                        <?php $t_price=$t_price + (($cart->item_price)*($cart->item_quantity)) ?>
                        <td>{{$t_price}}</td>

                        <td>
                            <a class="btn action-btn" href="{{url('/remove_cart',['id' => $cart->id, 'item_id '=> $cart->item_id] )}}">Discard</a>
                        </td>
                    </tr>
                    <!-- TOTAL PRICE CALCULATION -->
                    <?php $totalprice=$totalprice + (($cart->item_price)*($cart->item_quantity)) ?>
                    @empty
                    <tr>
                        <td colspan="5">No Product to show</td>
                    </tr>
                    @endforelse

                </tbody>

            </table>
        </div>


        <div class="t_sum">
            <table class="t_sumcontainer">
                <tr>

                    <td id="coupon"><label for="coupon"><strong>Coupon:</strong></label></td>
                    <td><input type="coup" id="coup" name="coup" maxlength="6" placeholder="Enter 6 Digit Code"></td>
                    <td> <button class="action-btnApply">Apply</button></td>
                </tr>
                <tr>
                    <td><strong>Subtotal:</strong></td>
                    <td id="subtotal">{{$totalprice}} $</td>
                    @php
                        session([
                            'total_from_cart' => $totalprice,
                        ]);
                    @endphp
                </tr>

            </table>
        </div>
        <!------------------------------------ Payment References ----------------------------->

            <div class="payment">
                <a href="{{url('cash_order')}}" class="checkout-link"><button class="checkout-btn">Check-Out</button></a>
                <a href="{{url('cash_order')}}" class="checkout-link"><button class="checkout-btn">Cash on Delivery</button></a>

                <a href="{{url('card',$totalprice)}}" class="checkout-link"><button class="checkout-btn">Card</button></a>
            </div>
        <script>
            // Calculate subtotal dynamically
            document.addEventListener('input', function (event) {
                if (event.target.classList.contains('quantity-input')) {
                    updateSubtotal();
                }
            });

            function updateSubtotal() {
                const quantity = document.querySelector('.quantity-input').value;
                const price = 19.99; // Replace with the actual price of the product
                const subtotal = (quantity * price).toFixed(2);
                document.getElementById('subtotal').textContent = '$' + subtotal;
            }

            // Initial calculation on page load
            updateSubtotal();
        </script>
    </body>
    <!------------------------- CART DETAILS EDITING  --------------------------------------------------->

</x-guest-layout>



