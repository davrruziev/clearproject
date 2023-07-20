<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create([
            'name'=>'Davr',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('secret'),
            'photo'=>null,
        ]);

        $user->roles()->attach([1,2]);


        $user2 = User::create([
            'name'=>'Abdul',
            'email'=>'abdul@admin.com',
            'password'=>Hash::make('secret'),
            'photo'=>null,
        ]);

        $user2->roles()->attach([2]);
    }
}
