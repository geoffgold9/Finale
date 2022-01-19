<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Users;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(count:10);
    }
}
