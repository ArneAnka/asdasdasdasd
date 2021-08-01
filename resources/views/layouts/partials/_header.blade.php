<div class="container mx-auto my-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="md:text-center">
            <span class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <a href="{{ route('welcome') }}">aktier.co</a>
            </span>
            <span class="hidden md:inline-block md:border-l md:pl-5 ml-5">Aggregerad handelsinformation</span>
            <span class="float-right">
                @if (Route::has('login'))
                    @auth
                        <div>
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @if(auth()->user()->unreadNotifications()->count())
                            <span class="absolute inline-block w-3 h-3 bg-yellow-300 border-2 border-white rounded-full"></span>
                        @endif
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                @endif
            </span>
        </div>
    </div>
    @if(env('APP_ANNOUNCEMENT'))
    <div class="bg-yellow-200 relative text-yellow-600 py-3 px-3 rounded-lg text-center mt-2">
        {{ env('APP_ANNOUNCEMENT') }}
    </div>
    @endif
</div>