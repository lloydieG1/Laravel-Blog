<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class AddComment extends Component
{

    public $model;
    public $body;

    public function render()
    {
        return view('livewire.add-comment');
    }

    public function getComments()
    {
        return $this->model->comments->sortByDesc('id');
    }

    public function addComment()
    {
        $this->validate([
            'body' => 'required|max:255',
        ]);
        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->body = $this->body;
        $comment->likes = 0;
        $comment->commentable_id = $this->model->id;
        $comment->commentable_type = $this->model::class;


        $comment->save();

        $this->body = '';
        $this->emit('commentCreated');
    }
}
