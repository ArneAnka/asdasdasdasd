<table class="table-auto text-left w-full" >
  <thead>
    <tr class="border-b border-gray-400">
      <th>Namn</th>
      <th>Pris</th>
      <th>1h</th>
      <th class="hidden sm:table-cell">24h</th>
      <th class="hidden sm:table-cell">Vecka</th>
      <th class="hidden sm:table-cell">Vecka</th>
    </tr>
  </thead>
  <tbody>
    <tr wire:init="loadShitCoinDataBitcoin" class="border-b border-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-opacity-50">
        @if(!empty($bitcoin))
      <td>
        <span class="flex items-center flex-col md:flex-row m-2">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"><g fill="none" fill-rule="evenodd"><circle cx="16" cy="16" r="16" fill="#F7931A"/><path fill="#FFF" fill-rule="nonzero" d="M23.189 14.02c.314-2.096-1.283-3.223-3.465-3.975l.708-2.84-1.728-.43-.69 2.765c-.454-.114-.92-.22-1.385-.326l.695-2.783L15.596 6l-.708 2.839c-.376-.086-.746-.17-1.104-.26l.002-.009-2.384-.595-.46 1.846s1.283.294 1.256.312c.7.175.826.638.805 1.006l-.806 3.235c.048.012.11.03.18.057l-.183-.045-1.13 4.532c-.086.212-.303.531-.793.41.018.025-1.256-.313-1.256-.313l-.858 1.978 2.25.561c.418.105.828.215 1.231.318l-.715 2.872 1.727.43.708-2.84c.472.127.93.245 1.378.357l-.706 2.828 1.728.43.715-2.866c2.948.558 5.164.333 6.097-2.333.752-2.146-.037-3.385-1.588-4.192 1.13-.26 1.98-1.003 2.207-2.538zm-3.95 5.538c-.533 2.147-4.148.986-5.32.695l.95-3.805c1.172.293 4.929.872 4.37 3.11zm.535-5.569c-.487 1.953-3.495.96-4.47.717l.86-3.45c.975.243 4.118.696 3.61 2.733z"/></g></svg>
            </span>
            <span>
                &nbsp;Bitcoin&nbsp;<span class="text-gray-400">BTC</span>
            </span>
        </span>
      </td>
      <td class="">
        USD {{ number_format($bitcoin['market_data']['current_price']['usd'], 2, ',', '.') }}
      </td>
      <td class="@if($bitcoin['market_data']['price_change_percentage_1h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($bitcoin['market_data']['price_change_percentage_1h_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($bitcoin['market_data']['price_change_percentage_24h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($bitcoin['market_data']['price_change_percentage_24h_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($bitcoin['market_data']['price_change_percentage_7d_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($bitcoin['market_data']['price_change_percentage_7d_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell">
        <img src="{{ asset('images/bitcoin_sparkline.svg') }}" alt="">
      </td>
    @else
        <livewire:shitcoins-loading/>
    @endif
    </tr>
    <tr wire:init="loadShitCoinDataEthereum" class="border-b border-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-opacity-50">
        @if(!empty($ethereum))
      <td>
        <span class="flex items-center flex-col md:flex-row m-2">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"><g fill="none" fill-rule="evenodd"><circle cx="16" cy="16" r="16" fill="#627EEA"/><g fill="#FFF" fill-rule="nonzero"><path fill-opacity=".602" d="M16.498 4v8.87l7.497 3.35z"/><path d="M16.498 4L9 16.22l7.498-3.35z"/><path fill-opacity=".602" d="M16.498 21.968v6.027L24 17.616z"/><path d="M16.498 27.995v-6.028L9 17.616z"/><path fill-opacity=".2" d="M16.498 20.573l7.497-4.353-7.497-3.348z"/><path fill-opacity=".602" d="M9 16.22l7.498 4.353v-7.701z"/></g></g></svg>
            </span><span>
                &nbsp;Ethereum&nbsp;<span class="text-gray-400">ETH</span>
            </span>
        </span>
      </td>
      <td class="">
        USD {{ number_format($ethereum['market_data']['current_price']['usd'], 2, ',', '.') }}
      </td>
      <td class="@if($ethereum['market_data']['price_change_percentage_1h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($ethereum['market_data']['price_change_percentage_1h_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($ethereum['market_data']['price_change_percentage_24h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($ethereum['market_data']['price_change_percentage_24h_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($ethereum['market_data']['price_change_percentage_7d_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($ethereum['market_data']['price_change_percentage_7d_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell">
        <img src="{{ asset('images/ethereum_sparkline.svg') }}" alt="">
      </td>
    @else
    <livewire:shitcoins-loading/>
    @endif
    </tr>
    <tr wire:init="loadShitCoinDataDogecoin" class="border-b border-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-opacity-50">
        @if(!empty($dogecoin))
      <td>
        <span class="flex items-center flex-col md:flex-row m-2">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"><g fill="none" fill-rule="evenodd"><circle cx="16" cy="16" r="16" fill="#C3A634"/><path fill="#FFF" d="M13.248 14.61h4.314v2.286h-4.314v4.818h2.721c1.077 0 1.958-.145 2.644-.437.686-.291 1.224-.694 1.615-1.21a4.4 4.4 0 00.796-1.815 11.4 11.4 0 00.21-2.252 11.4 11.4 0 00-.21-2.252 4.396 4.396 0 00-.796-1.815c-.391-.516-.93-.919-1.615-1.21-.686-.292-1.567-.437-2.644-.437h-2.721v4.325zm-2.766 2.286H9v-2.285h1.482V8h6.549c1.21 0 2.257.21 3.142.627.885.419 1.607.99 2.168 1.715.56.724.977 1.572 1.25 2.543.273.971.409 2.01.409 3.115a11.47 11.47 0 01-.41 3.115c-.272.97-.689 1.819-1.25 2.543-.56.725-1.282 1.296-2.167 1.715-.885.418-1.933.627-3.142.627h-6.549v-7.104z"/></g></svg>
            </span>
            <span>
                &nbsp;Dogecoin&nbsp;<span class="text-gray-400">DOGE</span>
            </span>
        </span>
      </td>
      <td class="">
        USD {{ $dogecoin['market_data']['current_price']['usd'] }}
      </td>
      <td class="@if($dogecoin['market_data']['price_change_percentage_1h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($dogecoin['market_data']['price_change_percentage_1h_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($dogecoin['market_data']['price_change_percentage_24h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($dogecoin['market_data']['price_change_percentage_24h_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($dogecoin['market_data']['price_change_percentage_7d_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($dogecoin['market_data']['price_change_percentage_7d_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell">
        <img src="{{ asset('images/dogecoin_sparkline.svg') }}" alt="">
      </td>
    @else
    <livewire:shitcoins-loading/>
    @endif
    </tr>
    <tr wire:init="loadShitCoinDataLitecoin" class="border-b border-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-opacity-50">
        @if(!empty($litecoin))
      <td>
        <span class="flex items-center flex-col md:flex-row m-2">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g fill="none" fill-rule="evenodd"><circle cx="16" cy="16" r="16" fill="#BFBBBB"/><path fill="#FFF" d="M10.427 19.214L9 19.768l.688-2.759 1.444-.58L13.213 8h5.129l-1.519 6.196 1.41-.571-.68 2.75-1.427.571-.848 3.483H23L22.127 24H9.252z"/></g></svg>
            </span>
            <span>
                &nbsp;Litecoin&nbsp;<span class="text-gray-400">LTC</span>
            </span>
        </span>
      </td>
      <td class="">
        USD {{ number_format($litecoin['market_data']['current_price']['usd'], 2, ',', '.') }}
      </td>
      <td class="@if($litecoin['market_data']['price_change_percentage_1h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($litecoin['market_data']['price_change_percentage_1h_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($litecoin['market_data']['price_change_percentage_24h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($litecoin['market_data']['price_change_percentage_24h_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($litecoin['market_data']['price_change_percentage_7d_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($litecoin['market_data']['price_change_percentage_7d_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell">
        <img src="{{ asset('images/litecoin_sparkline.svg') }}" alt="">
      </td>
      @else
      <livewire:shitcoins-loading/>
      @endif
    </tr>
    <tr wire:init="loadShitCoinDataHexcoin" class="border-b border-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-opacity-50">
        @if(!empty($hexcoin))
      <td>
        <span class="flex items-center flex-col md:flex-row m-2">
            <span>
                <img src="{{ $hexcoin['image']['small'] }}" style="width: 32px; width: 32px;">
            </span>
            <span>
                &nbsp;Hex&nbsp;<span class="text-gray-400">HEX</span>
            </span>
        </span>
      </td>
      <td class="">
        USD {{ number_format($hexcoin['market_data']['current_price']['usd'], 5, ',', '.') }}
      </td>
      <td class="@if($hexcoin['market_data']['price_change_percentage_1h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($hexcoin['market_data']['price_change_percentage_1h_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($hexcoin['market_data']['price_change_percentage_24h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($hexcoin['market_data']['price_change_percentage_24h_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($hexcoin['market_data']['price_change_percentage_7d_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
        {{ round($hexcoin['market_data']['price_change_percentage_7d_in_currency']['usd'], 2) }}%
      </td>
      <td class="hidden sm:table-cell">
        <img src="{{ asset('images/hexcoin_sparkline.svg') }}" alt="">
      </td>
      @else
      <livewire:shitcoins-loading/>
      @endif
    </tr>
  </tbody>
</table>

