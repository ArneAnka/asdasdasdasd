<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Comment extends Component
{
    use AuthorizesRequests;

    public $comment;

    public $isEditing = false;
    public $editState = ['body' => ''];

    public $isReplying = false;
    public $replyState = ['body' => ''];

    protected $validationAttributes = [
        'replyState.body' => 'reply',
        'editState.body' => 'edit'
    ];

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public function updatedIsEditing($isEditing)
    {
        if(!$isEditing){
            return ;
        }

        $this->editState = ['body' => $this->comment->body];
    }

    public function editComment()
    {
        $this->authorize('update', $this->comment);

        $this->validate([
            'editState.body' => 'required'
        ]);

        $this->comment->update($this->editState);

        $this->isEditing = false;
    }

    public function postReply()
    {
        if(!$this->comment->isParent()){
            return;
        }
        $this->validate([
            'replyState.body' => 'required'
        ]);

        $reply = $this->comment->children()->make($this->replyState);
        $reply->user()->associate(auth()->user());
        $reply->commentable()->associate($this->comment->commentable);
        $reply->save();

        $this->replyState = ['body' => ''];

        $this->isReplying = false;

        $this->emitSelf('refresh');
    }

    public function deleteComment()
    {
        $this->authorize('delete', $this->comment);

        $this->comment->delete();

        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
