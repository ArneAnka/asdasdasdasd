<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Covid19Stats extends Component
{
    public $stats = [];

    public function loadCovidData()
    {
        $this->stats = Cache::remember('stats', 600, function(){
            return Http::get('https://corona.lmao.ninja/v2/countries/Sweden?today&strict')->json();
        });
    }

    public function render()
    {
        return view('livewire.frontpage.covid19-stats');
    }
}
