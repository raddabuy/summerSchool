<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->get()->count() == 0) {
            DB::table('users')->insert([
                [
                    'name' => 'admin',
                    'email' => 'admin@test.com',
                    'email_verified_at' => now(),
                    'password' => \Illuminate\Support\Facades\Hash::make('password123'),
                    'remember_token' => Str::random(10),
                ]

            ]);
        }
        else{
            echo "Table is not empty";
        }

    }
}
