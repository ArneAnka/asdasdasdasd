<x-guest-layout>

  <livewire:news-banner />

  @include('layouts.partials._header')

  <div class="container mx-auto">

    <div class="bg-white p-4 rounded shadow">
      <!-- https://github.com/spothq/cryptocurrency-icons/tree/master/svg/color -->
      <livewire:shitcoin-data />
    </div>

    <div class="bg-white mt-5 p-4 rounded shadow">
      <livewire:market-data />
    </div>

    <div class="bg-white mt-5 p-4 rounded shadow">
      <livewire:covid19-stats />
    </div>

    <livewire:content-component />
  </div>

</x-guest-layout>