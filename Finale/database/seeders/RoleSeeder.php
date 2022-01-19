<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->times(count:10)->create();

        DB::tables(table: 'roles')->insert([
            'name' => 'Admin'
        ]);
        DB::tables(table: 'roles')->insert([
            'name' => 'Author'
        ]);
        DB::tables(table: 'roles')->insert([
            'name' => 'User'
        ]);
    }
        
}
