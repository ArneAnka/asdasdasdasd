      <td class="hidden sm:table-cell">
          {{ $cryptodata['market_cap_rank'] ?? 'NIL'}}
      </td>
      <td>
          <span class="flex items-center flex-col md:flex-row m-2">
              <span>
                  <img src="{{ $cryptodata['image'] }}" class="w-8" alt="">
              </span>
              <span>
                  &nbsp;{{ $cryptodata['name'] }}&nbsp;<span class="text-gray-400 uppercase">{{ $cryptodata['symbol'] }}</span>
              </span>
          </span>
      </td>
      <td class="">
          USD {{ number_format($cryptodata['current_price'], 2, ',', '.') }}
      </td>
      <td class="@if($cryptodata['price_change_percentage_1h_in_currency'] < 0) text-red-500 @else text-green-500 @endif">
          {{ round($cryptodata['price_change_percentage_1h_in_currency'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($cryptodata['price_change_percentage_24h_in_currency'] < 0) text-red-500 @else text-green-500 @endif">
          {{ round($cryptodata['price_change_percentage_24h_in_currency'], 2) }}%
      </td>
      <td class="hidden sm:table-cell @if($cryptodata['price_change_percentage_7d_in_currency'] < 0) text-red-500 @else text-green-500 @endif">
          {{ round($cryptodata['price_change_percentage_7d_in_currency'], 2) }}%
      </td>
      <td class="hidden sm:table-cell">
          <img src="{{ asset('storage/images/'. $cryptodata['id'] .'_sparkline.svg') }}" alt="">
      </td>