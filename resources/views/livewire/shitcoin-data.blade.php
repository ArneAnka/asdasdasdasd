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
        <img src="{{ asset('storage/images/bitcoin_sparkline.svg') }}" alt="">
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
        <img src="{{ asset('storage/images/ethereum_sparkline.svg') }}" alt="">
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
        <img src="{{ asset('storage/images/dogecoin_sparkline.svg') }}" alt="">
      </td>
    @else
    <livewire:shitcoins-loading/>
    @endif
    </tr>
    <tr wire:init="loadShitCoinDataCardano" class="border-b border-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-opacity-50">
      @if(!empty($cardano))
    <td>
      <span class="flex items-center flex-col md:flex-row m-2">
          <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 2000 1848"><g fill="#3cc8c8" transform="translate(0-70)"><path d="m975.46 75.46c43.59-22.73 96.8 30 73.64 73.55-13.45 35.5-64.45 44.94-90.5 17.88-27.6-25.97-18.6-77.3 16.86-91.43"/><path d="m506.61 126c26.48-10.9 60 13.36 57.3 42.22 2.81 31.33-35.5 54.39-62.49 39.5-35.76-13.85-31.67-71.9 5.19-81.72"/><path d="m1466.87 208.6c-41.38-5-47.93-70.06-8.09-83.16 30.9-15.07 59.25 13.19 63.77 42.48-6.48 25.01-27.42 47.91-55.68 40.68"/><path d="m613.29 325.55c44.27-28 107.44 13.7 100.63 65.12-2.3 51.92-71.26 82-110.17 46.9-37.62-27.57-31.92-90.82 9.54-112.02"/><path d="m1289.1 355.26c19.75-50.9 99.78-52.44 122.26-2.89 22.22 38.56-5.11 86.31-44.7 99.42-52.44 9.79-102.25-46.9-77.56-96.53"/><path d="m919 448.9c-.43-43.75 39.42-76.35 81-79.33 27.58 5.53 57.64 17.28 69.47 45.11 22.05 38.39 2.47 91.25-37.37 108.87-18.22 10.21-39.76 6.38-59.6 5.19-30.33-14.89-55.87-44.09-53.5-79.84"/><path d="m221.75 512.65c40.44-24.86 95 20.51 79.69 64.44-8.43 38-59.51 53.46-88.71 29.2-31.17-22.73-26.23-77.38 9.02-93.64"/><path d="m1719 512.57c34.31-26.64 90.93 3.92 86.84 47.24 2.3 39.5-46.65 69.29-80.71 48.95-37.51-16.86-41.34-74.57-6.13-96.19"/><path d="m1115.08 591.22c56.62-20.34 123.87 4 156.14 54.48 42.57 61.71 19.92 155.69-46.14 191.1-68.45 41.88-168.4 6.38-193.68-70.06-28.7-68.43 13.11-154.07 83.68-175.52"/><path d="m782.88 597.95c62.75-29.62 147.2-4.77 177.51 59.42 35.67 62.48 8.09 149.48-55.68 181.74-63.85 36.26-153.93 8.77-184.83-58.31-34.65-64.87-3.88-152.98 63-182.85"/><path d="m450.25 711.67c4.77-40.43 42.91-66.74 81.39-69.46 41.46 5 74.58 37.2 79.09 79.16-2.72 41.54-34.82 82.14-78.84 81.89-48.43 4.17-90.89-44.01-81.64-91.59"/><path d="m1432.73 651c49.72-28.94 118.76 13.19 116.55 70.31 3.41 60.52-73 103.17-122.51 67.67-51.43-29.56-47.42-112.81 5.96-137.98"/><path d="m647.69 864.3c58.15-16 124.64 11.41 153.16 64.86 31.24 53.8 18.47 128.54-30.05 168-62.23 57.88-177 34.64-210.12-44.35-38.06-72.41 8.17-169.45 87.01-188.51"/><path d="m1277.78 864c56.53-16.17 122.94 5.62 153.33 57.12 40.18 58.9 21 146.75-38.82 184.72-62.66 44.09-159.72 20.94-194.2-48-41.8-71.31.26-172.09 79.69-193.84"/><path d="m273.68 931.2c50.23-19 105.91 36.43 85.56 86.23-12.43 45.37-76.37 62.14-109.4 28.69-38.65-31.41-24.34-101.3 23.84-114.92"/><path d="m1635.18 1003.47c-1.45-41.62 29-78.48 71.68-80.78 34.4 5.45 67.85 33.2 65.13 70.65 3.15 49.46-56.45 83.08-98.59 59.84-19.75-10.04-29.88-30.3-38.22-49.71"/><path d="M26.7,955.63c30.22-13.19,67.6,13,60.7,46.56-1.62,38-57.72,52.61-78.33,20.86C-9.14,1001,1.76,967,26.7,955.63Z"/><path d="m1932.13 954.87c21.28-15.15 55.42-4.26 63.85 20.6 14.3 27.15-11.92 64.35-42.48 59.76-42.9 3.91-56.78-61.47-21.37-80.36"/><path d="m811.83 1137.28c79.52-20.68 165 45.63 165.5 127.51 5.19 82.74-79 156.11-160.4 137-62.92-10.13-112.29-70.74-110.25-134.32-.17-60.81 45.72-117.33 105.15-130.19"/><path d="m1126.75 1137.11c80.71-22.56 168.74 44.94 167.46 128.71 4.26 81.21-77.3 152.11-157 136-75-9.7-130.34-92.1-109.4-164.88 10.57-48.5 51.09-87.94 98.94-99.83"/><path d="m519.56 1187.51c55.85-9.53 108.21 52.78 85.56 105.81-16.52 56.51-98.76 71.84-135.12 25.68-42.65-44.33-10.81-125.37 49.56-131.49"/><path d="m1443.11 1190c49.8-20.86 110.93 22.22 107.1 76.27 2 59.5-73.47 100.53-122.17 65.8-55.16-31.18-45.12-122.94 15.07-142.07"/><path d="m1701.25 1448.92c-19.5-36.35 15.92-84.53 56.28-77.8 20.09-.34 34.14 15.49 47 28.77 2.64 21.54 7.07 47.24-10.81 63.84-24.28 30.73-79.28 21.96-92.47-14.81"/><path d="m221.58 1381.24c37.72-25.11 92 12.34 83.52 56.44-4.51 39-53.64 61.29-86 39.16-34.73-20.09-33.45-77.29 2.48-95.6"/><path d="m966.78 1462.88c49.38-21.79 112.29 21.2 107.61 75.59 3.66 60.1-74.15 101.72-122.43 65.63-53.63-30.99-44.69-122.16 14.82-141.22"/><path d="m621.63 1543.4c42.06-22.13 98.5 16.09 94.67 63.16 1.28 38.65-36.44 71.59-74.58 65.88-31.59-.68-52.19-29-62.32-55.93.52-29.35 12.6-62.04 42.23-73.11"/><path d="m1320.77 1544.08c43.25-26.73 104.72 11.66 100.63 62 1.11 52.61-68.36 86.31-108.63 51.75-38.99-27.09-34.23-92.21 8-113.75"/><path d="m1442.35 1844.65c-19.24-29.11 3.41-64.18 34.65-70.82 25.12 5.11 51.68 24 46.4 53.12-3.66 39.41-61.3 51.5-81.05 17.7"/><path d="m477.24 1819.37c7.66-23.07 26.22-46 53.38-40 39.59 2.81 51.34 62.48 16.69 80.87-31.16 21.01-67.31-7.76-70.07-40.87"/><path d="m942.85 1845.84c7.58-34.13 51.76-50.73 80.88-32.6 19.24 8.26 24.86 29.79 29.8 48.09-2.64 9.53-5 19.07-7.32 28.6-11.92 14.13-27.24 28.26-47.08 27.75-36.87 4.32-70.13-37.36-56.28-71.84"/></g></svg>
          </span>
          <span>
              &nbsp;Cardano&nbsp;<span class="text-gray-400">ADA</span>
          </span>
      </span>
    </td>
    <td class="">
      USD {{ $cardano['market_data']['current_price']['usd'] }}
    </td>
    <td class="@if($cardano['market_data']['price_change_percentage_1h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
      {{ round($cardano['market_data']['price_change_percentage_1h_in_currency']['usd'], 2) }}%
    </td>
    <td class="hidden sm:table-cell @if($cardano['market_data']['price_change_percentage_24h_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
      {{ round($cardano['market_data']['price_change_percentage_24h_in_currency']['usd'], 2) }}%
    </td>
    <td class="hidden sm:table-cell @if($cardano['market_data']['price_change_percentage_7d_in_currency']['usd'] < 0) text-red-500 @else text-green-500 @endif">
      {{ round($cardano['market_data']['price_change_percentage_7d_in_currency']['usd'], 2) }}%
    </td>
    <td class="hidden sm:table-cell">
      <img src="{{ asset('storage/images/cardano_sparkline.svg') }}" alt="">
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
        <img src="{{ asset('storage/images/litecoin_sparkline.svg') }}" alt="">
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
        <img src="{{ asset('storage/images/hexcoin_sparkline.svg') }}" alt="">
      </td>
      @else
      <livewire:shitcoins-loading/>
      @endif
    </tr>
  </tbody>
</table>
