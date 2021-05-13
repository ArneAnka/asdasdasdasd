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

    public function clear(){
        $this->reset('search');
    }

    public function render()
    {
        $collection = collect();

        $posts = Post::search('topic', $this->search)->with(['user'])->latest()->get();
        $urls = Urls::search('topic', $this->search)->with(['user'])->latest()->get();
        $news = News::search('topic', $this->search)->latest()->get();

        /** Push posts to the collection */
        foreach ($posts as $post) $collection->push($post);
        /** Push urls to the collection */
        foreach ($urls as $item) $collection->push($item);
        /** Push news to the collection */
        foreach ($news as $item) $collection->push($item);

        $collection->each(function($item, $key){
            $item->user_has_liked = $item->likers->contains(auth()->user()) ? true : false;
        });

        return view('livewire.content-component', [
            'urls_news_and_posts' => $collection->sortByDesc('created_at')->sortByDesc('sticky')->paginate(10)
        ]);
    }
}
