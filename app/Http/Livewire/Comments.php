<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CommentToModel;

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

        // Send a notification to the model owner, but not if it is me whos made the model.
        // And also, if the model is news, dont send notification at all!
        // Todo: move to model?
        $class_namn = class_basename($this->model);
        if($class_namn != 'News'){
            if ($this->model->user != auth()->user()) {
                Notification::send($this->model->user, new CommentToModel($this->model));
            }
        }

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
