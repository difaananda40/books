<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::insert([
            [
                'name' => 'user',
                'created_at' => date('Y-m-d')
            ],
            [
                'name' => 'admin',
                'created_at' => date('Y-m-d')
            ],
        ]);
    }
}
