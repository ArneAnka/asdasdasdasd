<?php

namespace App\Http\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class ContentComponent extends Component
{
    use WithPagination;

    public $title = "";
    public $url = "";
    public $sticky = "";
    public $search = "";
    public $showCreateModal = false;

    protected $rules = [
        'title' => 'required|min:5|max:140',
        'url' => 'url',
        'sticky' => '',
    ];

    public function test(){
        $this->showCreateModal = true;
    }

    public function clear(){
        $this->reset('search');
    }

    public function save(){
        $this->validate();
        $news = new News();
        $news->topic = $this->title;
        $news->url = $this->url;
        $news->site = $this->url ? parse_url($this->url)['host'] : 'self.co';
        $news->sticky = $this->sticky ? true : false;
        $news->save();

        $this->title = '';
        $this->url = '';

        $this->showCreateModal = false;
    }

    public function render()
    {
        return view('livewire.content-component', [
            'newsLinks' => News::search('topic', $this->search)->latest()->paginate(50)
        ]);
    }
}
