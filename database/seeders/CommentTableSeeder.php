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
        $c1->date_commented = '2022-11-04 20:26:43';
        $c1->commentable_id = 1;
        $c1->commentable_type = 'page';
        
        $c1->save();

    }
}
