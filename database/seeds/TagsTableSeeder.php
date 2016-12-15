<?php

use Illuminate\Database\Seeder;
use P4\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['new','used','white','colorful','girlish','boyish'];

        foreach($data as $tagName) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}
