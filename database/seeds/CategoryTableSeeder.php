<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Desktops';
        $category->save();

        $category = new Category();
        $category->name = 'LapTops';
        $category->save();

        $category = new Category();
        $category->name = 'Tablets';
        $category->save();

        $category = new Category();
        $category->name = 'Smartphones';
        $category->save();

    }
}
