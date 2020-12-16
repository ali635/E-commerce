<?php

namespace Database\Seeders;

use App\Models\Category;

use Doctrine\Inflector\Rules\Word;
use Illuminate\Database\Seeder;

class SubCategoryDatabaseseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(3)->create([
            'parent_id' => $this->getRandomParentId()
        ]);
    }
    public function getRandomParentId(){
        $parent_id = Category::inRandomOrder()->first();
        return $parent_id;
    }
}
