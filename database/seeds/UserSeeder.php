<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                   'name' => 'samar singh',
                   'email' => 'hardeep123@gmail.com',
                   'password' => Hash::make('12345678'), // 12345678 is the admin password.
                   'userType'=>'admin',
                   'created_at'     =>    Carbon::now(),
                   'updated_at'     =>   Carbon::now(),
               ]);
    }
}
