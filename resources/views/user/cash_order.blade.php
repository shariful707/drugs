@section('title', 'Cash on Delivery | Pritom Drug Store')
<x-guest-layout>

    <head>
        <title>Cash on Delivery Details</title>
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

            .container {


                background-color: rgb(255, 255, 255);
                padding: 20px;
                border-radius: 20px;
                box-shadow: 0 0 80px rgba(0, 0, 0, 0.1);
            }

            label {
                display: block;
                margin-bottom: 8px;
                font-weight: bold
            }

            .dt input {
                width: 100%;
                padding: 8px;
                margin-bottom: 16px;
                box-sizing: border-box;
            }

            button {
                background-color: #008000;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            button:hover {
                background-color: #013220;
            }

            textarea {
                width: 100%;
                padding: 8px;
                margin-bottom: 16px;
                box-sizing: border-box;
                resize: none;
                /* Prevents resizing */
            }

            ul {
                list-style: none;
            }

            .order-area {
                padding-right: 20px;
            }

            .order-area ul {
                margin-bottom: 20px;
            }

            .payment-method {
                margin-top: 40px
            }

            .payment-method input {
                display: inline;
            }

            .payment-method label {
                display: inline;
            }
        </style>
    </head>

    <body>
        <header>
            <h1>Delivery Details</h1>
        </header>

        <form method="POST" action="{{ url('place_Corder') }}" class="mb-4">
            <div class="container mx-auto">
                <div class="lg:w-2/3 px-4">
                    <div class="order-area">
                        <h3 class="text-lg font-semibold">Your Order</h3>
                        <ul class="total-cost space-y-1">
                            <li class="flex justify-between">Shipping <span class="font-bold">Free</span></li>
                            <li class="flex justify-between">Total <span
                                    class="font-bold">{{ session('total_from_cart') }}$</span></li>
                        </ul>

                        <ul class="payment-method space-y-1 mt-4">
                            <fieldset>
                                <li>
                                    <input type="radio" id="louie" name="payment_status" value="1" />
                                    <label for="card">Online</label>
                                </li>
                                <li>
                                    <input type="radio" id="louie" name="payment_status" value="2" />
                                    <label for="delivery">Cash on Delivery</label>
                                </li>
                            </fieldset>
                        </ul>


                    </div>
                </div>
                <div class="lg:flex">
                    <div class="lg:w-1/3 px-4 dt">

                        @csrf
                        <label for="name" class="block">Name:</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-3 py-2 border rounded mt-1">

                        <label for="phone" class="block mt-4">Contact Number:</label>
                        <input type="tel" id="phone" name="phone" required
                            class="w-full px-3 py-2 border rounded mt-1">

                        <label for="mail" class="block mt-4">E-mail:</label>
                        <input type="email" id="mail" name="mail" required
                            class="w-full px-3 py-2 border rounded mt-1">

                        <label for="address" class="block mt-4">Delivery Address:</label>
                        <textarea id="address" name="address" rows="6" required class="w-full px-3 py-2 border rounded mt-1"></textarea>

                        <!-- submit button -->
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded mt-4">Place
                            Order</button>
                    </div>
                </div>
            </div>
        </form>

    </body>

</x-guest-layout>
