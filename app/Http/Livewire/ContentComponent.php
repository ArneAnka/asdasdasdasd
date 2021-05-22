<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\Like;
use App\Models\Post;
use App\Models\News;
use App\Models\Urls;
use Livewire\Component;
use Livewire\WithPagination;

class ContentComponent extends Component
{
    use WithPagination;

    public $search = "";
    public $liked = [];

    public $listeners = [
        'newPostWasMade' => 'render',
        'newUrlWasMade' => 'render',
        'postWasDeleted' => 'render',
        'urlsWasDeleted' => 'render',
        'newsWasDeleted' => 'render'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->reset('search');
        $this->resetPage();
    }

    public function render()
    {
        $data = News::search('topic', $this->search)->orderBy('sticky', 'DESC')->latest()->paginate(50);

        $data->each(function($item, $key){
            $item->user_has_liked = $item->likers->contains(auth()->user()) ? true : false;
        });

        return view('livewire.frontpage.content-component', [
            // 'urls_news_and_posts' => News::search('topic', $this->search)->orderBy('sticky', 'DESC')->orderBy('created_at', 'DESC')->paginate(50)
            'urls_news_and_posts' => $data
            // 'urls_news_and_posts' => $collection->sortByDesc('created_at')->sortByDesc('sticky')->paginate(50)
        ]);
    }
}
