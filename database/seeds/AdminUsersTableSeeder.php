<?php

use Illuminate\Database\Seeder;
use App\AdminUser;
class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = new AdminUser();
       $user->name = 'Umut';
       $user->email = 'info@infinitumagency.com';
       $user->password = bcrypt('infini2018**');
       $user->save();
    }
}
