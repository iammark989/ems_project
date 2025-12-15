<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Post extends Component
{
    public $posts = [];
    public function mount(){
        $this->posts = DB::table('posts')
            ->select([
                'posts.title AS TITLE',
                'posts.message AS MESSAGE',
                'users.username AS USERNAME',
                'users.images AS IMAGE',
                'posts.created_at as POSTDATE'
                ])
                ->join('users','users.id','=','user_id')
                ->orderBy('posts.id','desc')
                ->get();
    }


    public function render()
    {
        return view('livewire.post');
    }
}
