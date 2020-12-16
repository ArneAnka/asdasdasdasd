<x-guest-layout>

  <livewire:news-banner/>

  <div class="container mx-auto my-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="lg:text-center">
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          Aggregerad handelsinformation
        </p>
      </div>
    </div>
  </div>

  <div class="container mx-auto">
    <div class="flex flex-col bg-gray-200 rounded p-1 md:p-8 lg:p-8 shadow">

      <div class="bg-white p-4 rounded shadow">
        <!-- https://github.com/spothq/cryptocurrency-icons/tree/master/svg/color -->
        <livewire:shitcoin-data/>
      </div>

      <div class="bg-white mt-5 p-4 rounded shadow">
        <livewire:market-data/>
      </div>

      <div class="bg-white mt-5 p-4 rounded shadow">
        <livewire:covid19-stats/>
      </div>

      <livewire:content-component/>

  <div class="container mx-auto mt-4">
    <div class="flex items-center">
      @if (Route::has('login'))
        @auth
          <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
        @else
          <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
          @endif
        @endauth
      @endif
    </div>
  </div>

</x-guest-layout>
