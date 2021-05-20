<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CoinData extends Component
{
    public $cryptodata;

    public function render()
    {
        return view('livewire.coin-data');
    }
}
