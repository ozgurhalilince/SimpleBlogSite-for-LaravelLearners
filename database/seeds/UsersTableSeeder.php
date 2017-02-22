<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        //$admin->role_id = \App\Role::where('name', 'admin')->first()->id;
        $admin->name = "Özgür İNCE";
        $admin->email = "o@o.com";
        $admin->password = bcrypt('oooooo');
        $admin->remember_token = uniqid();
        $admin->deleted_at = NULL;
        $admin->save();
    }
}
