<?php

namespace Database\Seeders;

use App\Models\Category;

use Doctrine\Inflector\Rules\Word;
use Illuminate\Database\Seeder;

class CategoryDatabaseseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(10)->create();
    }
}
