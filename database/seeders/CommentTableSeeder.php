<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // single manual row
        $c1 = new Comment;

        $c1->likes = 10;
        $c1->body = 'I like your page';
        $c1->user_id = 100;
        $c1->commentable_id = 1;
        $c1->commentable_type = 'page';

        $c1->save();

    }
}
