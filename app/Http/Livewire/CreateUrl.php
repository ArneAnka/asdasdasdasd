<?php

namespace App\Http\Livewire;

use App\Models\Url;
use Livewire\Component;

class CreateUrl extends Component
{
    public $title = "";
    public $url = "";
    public $sticky = "";
    public $showCreateNewUrlModal = false;

    protected $rules = [
        'title' => 'required|min:5|max:140',
        'url' => 'required|url|unique:urls,url',
        'sticky' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function newUrl()
    {
        $this->showCreateNewUrlModal = true;
    }

    public function save()
    {
        $validatedData = $this->validate();
        // Urls::create($validatedData);

        $url = new Url();
        $url->topic = $this->title;
        $url->user_id = auth()->user()->id;
        $url->url = $this->url;
        $url->site = $this->url ? parse_url($this->url)['host'] : 'self.co';
        $url->sticky = $this->sticky ? true : false;
        $url->save();

        $this->title = '';
        $this->url = '';

        $this->showCreateNewUrlModal = false;

        /** Re-render ContenController */
        /** https://forum.laravel-livewire.com/t/can-i-fire-refresh-from-a-component-method/139/4 */
        $this->emit('newUrlWasMade');
    }

    public function render()
    {
        return view('livewire.frontpage.create-url');
    }
}
