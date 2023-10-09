<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\{User,Role,Permission};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ['name'=>'Add Post','slug'=>'add-post'],
            ['name'=>'Edit Post','slug'=>'edit-post'],
            ['name'=>'Delete Post','slug'=>'delete-post'],
        ]);

        Role::insert([
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'Editor','slug'=>'editor'],
            ['name'=>'Author','slug'=>'author'],
            ['name'=>'User','slug'=>'user'],
        ]);
        
        User::insert([
            ['name'=>'Admin','email'=>'admin@gmail.com','password'=>bcrypt('11111111'),'remember_token' => Str::random(10),'email_verified_at' => now(),],
            ['name'=>'Editor','email'=>'editor@gmail.com','password'=>bcrypt('11111111'),'remember_token' => Str::random(10),'email_verified_at' => now(),],
            ['name'=>'Author','email'=>'author@gmail.com','password'=>bcrypt('11111111'),'remember_token' => Str::random(10),'email_verified_at' => now(),],
            ['name'=>'user','email'=>'user@gmail.com','password'=>bcrypt('11111111'),'remember_token' => Str::random(10),'email_verified_at' => now(),],
        ]);
        //\App\Models\User::factory(100)->create();
    }
}
