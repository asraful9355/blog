<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
         'name'=>'admin',
         'email'=>'admin@gmail.com',
         'password'=>bcrypt('password')
    ]);

    Profile::create([
      'user_id' => $user->id,
      'about'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, vero sed fuga debitis illo voluptatibus perspiciatis earum',
      'facebook' => 'facebook.com',
      'youtube' => 'youtube.com'
  ]);
  }
}

