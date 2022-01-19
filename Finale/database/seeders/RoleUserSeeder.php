<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;
class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();

        User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(number:1)->pluck(value:'id')
            );

        });

    }
}
