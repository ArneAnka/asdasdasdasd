<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cookie;

class NewsBanner extends Component
{

    public ?bool $bannerClicked = false;
    private string $cookieName = 'banner_clicked';

    public function mount()
    {
        $this->bannerClicked = (bool) request()->cookie($this->cookieName);
    }

    public function bannerClicked()
    {
        $this->bannerClicked = true;
        // Params are 'name', 'value' and 'expire' (in minutes)
        Cookie::queue($this->cookieName, 1, 43200);
    }

    public function render() : View
    {
        return view('livewire.news-banner');
    }
}
