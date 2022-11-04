<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u1 = new User;
        $u1->name = 'Andre';
        $u1->email = 'icecold@gmail.com'; 
        $u1->password = '82f39n475f89023n';
        $u1->remember_token = 'Z5gGaw38cS5ac36';

        $u1->save();
        //User::factory(100)->create();
    }
}
