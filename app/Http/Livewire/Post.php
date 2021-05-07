<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Post extends Component
{
    use AuthorizesRequests;

    public $isEditing = false;
    public $editState = [
        'body' => ''
    ];
    public $collection;
    protected $validationAttributes = [
        'editState.body' => 'body'
    ];

    public function updatedIsEditing($isEditing)
    {
        // $this->authorize('update', $this->collection->post);

        if(!$isEditing){
            return ;
        }
        $this->editState = ['body' => $this->collection->body];
    }

    public function editPost()
    {
        $this->authorize('update', $this->collection);

        $this->validate([
            'editState.body' => 'required'
        ]);

        $this->collection->update($this->editState);

        $this->isEditing = false;
    }

    public function storeLike()
    {
        if (!auth()->check()) {
            return redirect()->to('/login');
        }

        if ($this->collection->likers->contains(auth()->user())) {
            return $this->collection->likes()->where('user_id', auth()->user()->id)->delete();
        }

        // Set the user_has_liked to true. This is needed on the front-end
        $this->collection->user_has_liked = true;

        // Prepare and store the like
        $like = $this->collection->likes()->make();
        $like->user()->associate(auth()->user());

        $like->save();

        // Why do i need this??
        $this->emit('newPostWasMade');
    }

    public function deletePost()
    {
        $this->authorize('delete', $this->collection);
        $this->collection->delete();

        $this->emitUp('postWasDeleted');
    }

    public function render()
    {
        return view('livewire.post');
    }
}
