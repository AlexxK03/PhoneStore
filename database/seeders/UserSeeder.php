<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();

        $role_user = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Alex Killian';
        $admin->email = 'ak@gmail.com';
        $admin->password = Hash::make('password123');
        $admin->save();

       $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Peter Killian';
        $user->email = 'pk@gmail.com';
        $user->password = Hash::make('password');
        $user->save();

        $user->roles()->attach($role_user);
    }
}
