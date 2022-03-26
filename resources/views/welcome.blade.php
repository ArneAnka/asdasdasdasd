<x-guest-layout>

  <div class="container mx-auto">

    <div class="bg-white p-4 rounded shadow">
      <!-- https://github.com/spothq/cryptocurrency-icons/tree/master/svg/color -->
      <livewire:shitcoin-data />
    </div>

    <div class="bg-white mt-5 p-4 rounded shadow">
      <livewire:market-data />
    </div>

    <livewire:content-component />
  </div>

</x-guest-layout>