<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // single manual row
        $u1 = new User;
        $u1->name = 'ADMIN';
        $u1->role = 'admin';
        $u1->email = 'icecold@gmail.com';
        $u1->password = bcrypt('mypassword');
        $u1->remember_token = 'Z5gGaw38cS5ac36';

        $u1->save();

        // Generate fake data for all tables with corerct relationships
        $numUsers = 50;
        $pagesPerUser = 1;
        $postsPerPage = 5;
        $commentsPerPost = 5;
        $commentsPerPage = 5;
        $tagsPerPost = 3;

        // Generate tags in tags table
        $tags = Tag::factory()->count($tagsPerPost)->create();

        User::factory($numUsers)->has(
            Page::factory()->count($pagesPerUser)->has(
                Post::factory()->count($postsPerPage)
                ->hasComments($commentsPerPost)
                ->hasAttached(
                    /**
                     * Link each post to all tags in pivot table to
                     * set up test many-to-many relationships
                     */
                    $tags
                )
            )->hasComments($commentsPerPage)
        )->create();
    }
}
