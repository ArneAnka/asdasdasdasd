<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $model;

    protected $listeners = ['refresh' => '$refresh'];

    public $newCommentState = [
        'body' => ''
    ];
    protected $validationAttributes = [
        'newCommentState.body' => 'comment'
    ];

    public function postComment()
    {
        $this->validate(['newCommentState.body' => 'required']);

        $comment = $this->model->comments()->make($this->newCommentState);
        $comment->user()->associate(auth()->user());

        $comment->save();

        $this->newCommentState = [
            'body' => ''
        ];

        $this->resetPage();
    }

    public function render()
    {
        $comments = $this->model
        ->comments()
        ->with(['user', 'children.user', 'children.children'])
        ->parent()
        ->latest()
        ->paginate(10);

        return view('livewire.comments', ['comments' => $comments]);
    }
}
