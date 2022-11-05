<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Page;
use App\Models\Post;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // single manual row
        $p1 = new Page;

        $p1->description = 'welcome to my page!';
        $p1->user_id = 1;

        $p1->save();

    }
}
