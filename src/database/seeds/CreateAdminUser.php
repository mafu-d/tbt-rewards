<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an admin user
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = Hash::make('testtest');
        $user->status = 1;
        $user->save();
    }
}
