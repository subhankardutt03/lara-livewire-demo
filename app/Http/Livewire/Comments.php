<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    // public $comments;
    public $newComment;

    public function resetInputFields()
    {
        $this->newComment = '';
    }

    // public $comments = [
    //     [
    //         "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio quae ea quas distinctio,
    //         alias odit impedit, fuga inventore eligendi voluptatum sed officiis eos quidem.
    //         Recusandae praesentium mollitia repudiandae voluptatum nostrum? ",
    //         "created_at" => "3 min ago",
    //         "creator" => "Subhankar"
    //     ]
    // ];

    // public function mount($initialComment)
    // {
    //     $this->comments = $initialComment;
    // }

    public function validated($field)
    {
        $this->validateOnly($field, ['newComment' => 'required|max:250']);
    }

    public function AddComment()
    {
        $this->validate([
            'newComment' => 'required|max:250'
        ]);
        $createdComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1
        ]);

        // $this->comments->prepend($createdComment);
        $this->resetInputFields();
        session()->flash('message', 'Comment Added Successfully');
    }

    public function Remove($comment_id)
    {
        // dd($comment_id);
        $comment = Comment::find($comment_id);
        $comment->delete();
        // $this->comments = $this->comments->except($comment_id);
        session()->flash('message', 'Comment deleted successfully');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(2),
        ]);
    }
}