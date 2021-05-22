<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ShitcoinData extends Component
{
    public $cryptomarketdata = [];

    public function loadShitCoinData()
    {
        $this->cryptomarketdata = Cache::remember('cryptomarketdata', 300, function () {
            return Http::get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=bitcoin%2Cethereum%2Cdogecoin%2Ccardano%2Clitecoin%2Chex%2Cbanano&order=market_cap_desc&per_page=100&page=1&sparkline=false&price_change_percentage=1h%2C24h%2C7d')->json();
        });
    }

    public function render()
    {
        return view('livewire.frontpage.shitcoin-data');
    }
}
