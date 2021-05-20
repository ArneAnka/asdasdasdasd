<table class="table-auto text-left w-full">
  <thead>
    <tr class="border-b border-gray-400">
      <th class="hidden sm:table-cell">#</th>
      <th>Namn</th>
      <th>Pris</th>
      <th>1h</th>
      <th class="hidden sm:table-cell">24h</th>
      <th class="hidden sm:table-cell">Vecka</th>
      <th class="hidden sm:table-cell">Vecka</th>
    </tr>
  </thead>
  <tbody wire:init="loadShitCoinData">
    @if(!empty($cryptomarketdata))
    @foreach($cryptomarketdata as $key => $cryptodata)
    <tr class="border-b border-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-opacity-50">
      <livewire:coin-data :cryptodata="$cryptodata" />
    </tr>
    @endforeach
    @else
      @for ($x = 0; $x <= 6; $x++)
        <livewire:shitcoins-loading />
      @endfor
    @endif
    </tr>
  </tbody>
</table>