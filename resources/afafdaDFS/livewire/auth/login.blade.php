@section('title', 'Sign in to your account')

<div>
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone Laravel Admin Dashboard Starter Kit" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3">
                        Mid<span class="font-medium">one</span>
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone Laravel Admin Dashboard Starter Kit" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">A few more clicks to <br> sign in to your account.</div>
                    <div class="-intro-x mt-5 text-lg text-white">Manage all your e-commerce accounts in one place</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Sign In</h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                    <div class="intro-x mt-8">
                        <form id="login-form" wire:submit.prevent="authenticate">

                            <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus class="intro-x login__input input input--lg border border-gray-300 block " placeholder="Email">

                            @error('email')
                                <div id="error-email" class="input__error w-5/6 text-theme-6 mt-2">{{ $message }}</div>
                            @enderror


                            <input wire:model.lazy="password" id="password" type="password" required class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password">
                            @error('password')
                                <div id="error-password" class="input__error w-5/6 text-theme-6 mt-2">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                            <input type="checkbox" id="input-remember-me" class="input border mr-2" id="remember-me">
                            <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 xl:flex justify-center xl:justify-start">
                        <button type="submit" wire:loading.class="bg-gray" id="btn-login" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Login</button>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0">Sign up</a>
                        @endif
                    </div>
                </form>

                    <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                        By signin up, you agree to our <br> <a class="text-theme-1" href="">Terms and Conditions</a> & <a class="text-theme-1" href="">Privacy Policy</a>
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
</div>
