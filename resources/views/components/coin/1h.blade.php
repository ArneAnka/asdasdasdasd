@if(isset($coin['market_data']['price_change_percentage_1h_in_currency']['usd']))
    {{ round($coin['market_data']['price_change_percentage_1h_in_currency']['usd'], 2) }}%
@else
    ?%
@endif
