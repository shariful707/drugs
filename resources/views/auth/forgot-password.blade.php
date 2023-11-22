<x-guest-layout>
    <style>

        .box
        {
            height:340px
        }
        .m3
        {
            background-color:rgb(0, 0, 0);
            color:white;
            font-family:'Roboto', sans-serif;
            font-weight: 700;
            font-size: 16px;
            margin: 10px 0px 0px 33px;
            padding: 18px 180px;
            border-radius: 3px;
            border:1px solid silver;
        }
        .m3:hover
        {
            background-color:rgb(43, 142, 235);
            cursor: pointer;
            border:1px solid silver;
        }
        .text-box
        {
            text-decoration: none;
            color:rgb(255, 0, 25);
            text-align: center;
            list-style: none;
            font-weight: 900;
        }

    </style>
    <!-- Session Status -->
    <div class="container">
        <div class="box">
            <h1 style="text-align: center;">Forgot your password?</h1>
            <h2 style="text-align: center; font-size:15px;">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one</h2>
                
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    
                    <label for="email"><b>Email</b></label>
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="text-box" />
                    <x-auth-session-status class="text-box" :status="session('status')" />
                </div>

                
                <x-primary-button class='m3'>
                    {{ __('Reset Password') }}
                </x-primary-button>
                
            </form>
        </div>
    </div>
</x-guest-layout>
