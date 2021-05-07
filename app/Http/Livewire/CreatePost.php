<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $image;
    public $body = '';
    public $topic = '';
    public $showCreateNewPostModal = false;

    protected $rules = [
        'topic' => 'required',
        'body' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function newPost()
    {
        $this->showCreateNewPostModal = true;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|mimes:png,jpg,gif|max:3072', // 3MB Max
        ]);
    }

    public function savePost()
    {
        $this->validate();

        $post = new Post();
        $post->topic = $this->topic;
        $post->body = $this->body;
        $post->user_id = Auth::user()->id;

        if ($this->image) {
            $post->image = $this->image->store('images/uploads');
        }

        $post->save();

        /** Re-render ContenController */
        /** https://forum.laravel-livewire.com/t/can-i-fire-refresh-from-a-component-method/139/4 */
        $this->emit('newPostWasMade');

        $this->showCreateNewPostModal = false;

        $this->topic = '';
        $this->body = '';
        $this->image = NULL;


    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
