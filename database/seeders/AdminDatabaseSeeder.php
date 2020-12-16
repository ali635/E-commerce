<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'      => 'Ahmed Ali',
            'email'     => 'Ahmed@test.com',
            'password'  => bcrypt('12345678'),
        ]);
    }
}
