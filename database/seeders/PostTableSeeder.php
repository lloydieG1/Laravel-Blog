<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // single manual row
        $p1 = new Post;

        $p1->likes = 100;
        $p1->body = 'My day';
        $p1->body = 'Walked my dog today lul';
        $p1->image_url = 'pics\itsadoggydogworld.png';
        $p1->page_id = 1;

        $p1->save();

        Post::factory()->count(2)->create();

    }
}
