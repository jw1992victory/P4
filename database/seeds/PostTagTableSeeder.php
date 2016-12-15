<?php

use Illuminate\Database\Seeder;
use P4\Post;
use P4\Tag;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['new','used','white','colorful','girlish','boyish', 'classic'];

        $posts =[
            0 => ['new','white'],
            1 =>['used','colorful','girlish'],
            2 => ['boyish', 'classic'],
            3 => ['white', 'girlish']
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach($posts as $id => $tags) {

            # First get the book
            $post = Post::find($id);
            if (isset($post)) {
                foreach($tags as $tagName) {

                    $tag = Tag::where('name','like',$tagName)->first();
                    if (isset($post) && isset($tag)) {

                        # Connect this tag to this post
                        $post->tags()->save($tag);
                    }
                }
            }
            # Now loop through each tag for this book, adding the pivot


        }
    }
}
