<?php

use Illuminate\Database\Seeder;
use P4\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Wallet','Phone','Book','Bag','Key','Card', 'Other'];

        foreach($data as $categoryName) {
            $category = new Category();
            $category->name = $categoryName;
            $category->save();
        }
    }
}
