{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <!-- <link rel="stylesheet" href="<div class="form-field"> 
                    <label for="password">Password <span>*</span></label>
                     <input type="password" name="password" placeholder="Enter your password....." required value="{{old('email')}}">
                     <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>" -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('public/assets/backend/css/login.css')}}">
    <title>Login</title>
</head>
<body>
    <div class="form-container" id="form-container">
        <div class="image-part">
        <img src="{{url('public/assets/backend/images/brand_logo.png')}}" alt="">
        </div>
        <div class="form-part">
            <form method="POST" action="{{route('login')}}" class="form" id="login-form">
            @csrf
        
                <p style="text-align: center;font-size:17px;font-weight: 600;">LOGIN TO JUSTAIRPORTS</p>
                <div class="form-field">
                    <label for="text">Username <span>*</span></label>
                    <input type="text" class="border border-1" name="username" id="username" placeholder="Enter your username....."  value="{{old('username')}}">
                    @error('username')
                    <p style="color:red;">{{$message}}</p>
                  @enderror
                                        
                </div>
                
               
                <div class="form-field"> 
                    <label for="password">Password <span>*</span></label>
                     <input class="border border-1" type="password" name="password" placeholder="Enter your password....." required value="{{old('email')}}">
                     <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- <a href="{{route('password.request')}}" style="text-align:center;margin-top:5px"><span>Forget Password?</span></a> -->

                <button class="form-btn">Login</button>
                <!-- <p style="margin-top:5px">Don't have an account? <a href="{{route('register')}}">Signup here</a></p> -->
            </form>

             
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="{{url('public/assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
     <script>
        document.addEventListener("DOMContentLoaded",()=>{
            window.sessionStorage.setItem("login",true)
        })
     </script>

</body>
</html>