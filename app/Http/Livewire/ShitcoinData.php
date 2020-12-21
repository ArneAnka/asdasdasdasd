<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ShitcoinData extends Component
{
    public $bitcoin = [];
    public $ethereum = [];
    public $dogecoin = [];
    public $litecoin = [];
    public $hexcoin = [];

    public function loadShitCoinDataBitcoin()
    {
        $this->bitcoin = Cache::remember('bitcoin', 300, function(){
            return Http::get('https://api.coingecko.com/api/v3/coins/bitcoin?tickers=false&community_data=false&developer_data=false&sparkline=true')->json();
        });
    }

    public function loadShitCoinDataEthereum()
    {
        $this->ethereum = Cache::remember('ethereum', 300, function(){
            return Http::get('https://api.coingecko.com/api/v3/coins/ethereum?tickers=false&community_data=false&developer_data=false&sparkline=true')->json();
        });
    }

    public function loadShitCoinDataDogecoin()
    {
        $this->dogecoin = Cache::remember('dogecoin', 300, function(){
            return Http::get('https://api.coingecko.com/api/v3/coins/dogecoin?tickers=false&community_data=false&developer_data=false&sparkline=true')->json();
        });
    }

    public function loadShitCoinDataLitecoin()
    {
        $this->litecoin = Cache::remember('litecoin', 300, function(){
            return Http::get('https://api.coingecko.com/api/v3/coins/litecoin?tickers=false&community_data=false&developer_data=false&sparkline=true')->json();
        });
    }

    public function loadShitCoinDataHexcoin()
    {
        $this->hexcoin = Cache::remember('hexcoin', 300, function(){
            return Http::get('https://api.coingecko.com/api/v3/coins/hex?tickers=false&community_data=false&developer_data=false&sparkline=true')->json();
        });
    }

    public function render()
    {
        return view('livewire.shitcoin-data');
    }
}
