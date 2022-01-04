<?php

namespace Database\Seeders;

use App\Models\Api\Tours\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->category = 'playa';
        $category->save();
        #=============================#
        $category1 = new Category();
        $category1->category = 'naturaleza';
        $category1->save();
        #=============================#
        $category2 = new Category();
        $category2->category = 'cultural';
        $category2->save();
        #=============================#
        $category3 = new Category();
        $category3->category = 'volcan';
        $category3->save();
        #=============================#
        $category4 = new Category();
        $category4->category = 'other';
        $category4->save();
        #=============================#
    }
}