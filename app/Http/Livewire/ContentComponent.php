<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\News;
use App\Models\Url;
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
        $news = News::search('topic', $this->search)->latest()->get();
        $posts = Post::search('topic', $this->search)->latest()->get();
        $urls = Url::search('topic', $this->search)->latest()->get();

        $data = $news->merge($urls)->merge($posts);

        // $data = $data->sortByDesc('created_at')->sortByDesc('sticky')->paginate(50);
        $data = $data->sortBy('created_at', SORT_REGULAR, true)->sortBy('sticky', SORT_REGULAR, true)->values()->paginate(50);

        $data->each(function($item){
            $item->user_has_liked = $item->likers->contains(auth()->user()) ? true : false;
        });

        return view('livewire.frontpage.content-component', [
            // 'urls_news_and_posts' => News::search('topic', $this->search)->orderBy('sticky', 'DESC')->orderBy('created_at', 'DESC')->paginate(50)
            'urls_news_and_posts' => $data
            // 'urls_news_and_posts' => $collection->sortByDesc('created_at')->sortByDesc('sticky')->paginate(50)
        ]);
    }
}
