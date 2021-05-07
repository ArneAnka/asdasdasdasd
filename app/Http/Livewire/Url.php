<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Url extends Component
{
    use AuthorizesRequests;

    public $collection;

    public function storeLike()
    {
        if(!auth()->check()) {
            return redirect()->to('/login');
        }

        if ($this->collection->likers->contains(auth()->user())) {
            return $this->collection->likes()->where('user_id', auth()->user()->id)->delete();
        }

        $this->collection->user_has_liked = true;

        $like = $this->collection->likes()->make();
        $like->user()->associate(auth()->user());

        $like->save();
    }

    public function deleteUrls()
    {
        $this->authorize('delete', $this->collection);
        $this->collection->delete();

        $this->emitUp('urlsWasDeleted');
    }

    public function render()
    {
        return view('livewire.url');
    }
}
