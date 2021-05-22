<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MarketData extends Component
{
    public $data = [];

    public function loadMarketData(){
        $this->data = Cache::remember('data', 120, function(){
            return Http::get('http://165.22.25.72/markets')->json();
        });
    }

    public function render()
    {
        return view('livewire.frontpage.market-data');
    }
}
