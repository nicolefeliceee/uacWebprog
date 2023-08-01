<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'nicole',
            'email' => 'nicole@gmail.com',
            'instagram' => 'http://www.instagram.com/nicole',
            'phone' => '081994352967',
            'hobby1' => 'read',
            'hobby2' => 'code',
            'hobby3' => 'swim',
            'gender' => 'female',
            'image' => 'users/female1.jpg',
            'password' => bcrypt('nicole')
        ]);

        User::create([
            'name' => 'nicole2',
            'email' => 'nicole2@gmail.com',
            'instagram' => 'http://www.instagram.com/nicole',
            'phone' => '081994352967',
            'hobby1' => 'run',
            'hobby2' => 'code',
            'hobby3' => 'swim',
            'gender' => 'female',
            'image' => 'users/female2.jpg',
            'password' => bcrypt('nicole')
        ]);

        User::create([
            'name' => 'nicole3',
            'email' => 'nicole3@gmail.com',
            'instagram' => 'http://www.instagram.com/nicole',
            'phone' => '081994352967',
            'hobby1' => 'write',
            'hobby2' => 'cook',
            'hobby3' => 'swim',
            'gender' => 'female',
            'image' => 'users/female3.jpg',
            'password' => bcrypt('nicole')
        ]);

        User::create([
            'name' => 'nicole4',
            'email' => 'nicole4@gmail.com',
            'instagram' => 'http://www.instagram.com/nicole',
            'phone' => '081994352967',
            'hobby1' => 'read',
            'hobby2' => 'code',
            'hobby3' => 'swim',
            'gender' => 'male',
            'image' => 'users/male1.jpg',
            'password' => bcrypt('nicole')
        ]);

        User::create([
            'name' => 'nicole5',
            'email' => 'nicole5@gmail.com',
            'instagram' => 'http://www.instagram.com/nicole',
            'phone' => '081994352967',
            'hobby1' => 'read',
            'hobby2' => 'code',
            'hobby3' => 'swim',
            'gender' => 'male',
            'image' => 'users/male3.jpg',
            'password' => bcrypt('nicole')
        ]);

        Avatar::create([
            'name' => 'Sasuke',
            'price' => 50,
            'image' => 'avatars/1.jpeg'
        ]);

        Avatar::create([
            'name' => 'Naruto',
            'price' => 100000,
            'image' => 'avatars/2.jpg'
        ]);

        Avatar::create([
            'name' => 'Kagura',
            'price' => 1000,
            'image' => 'avatars/3.jpg'
        ]);

    }
}
