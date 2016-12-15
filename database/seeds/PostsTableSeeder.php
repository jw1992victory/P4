<?php

use Illuminate\Database\Seeder;
use P4\Post;
use P4\Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $posts = [
            ['0','Harvard Campus','Wallet', 0, null, 'jill@harvard.edu', '123456789', '', 0],
            ['0','Heymarket', 'Phone', 0, 1, 'jamal@harvard.edu','2000000','', 1],
            ['1','Back Bay', 'Book', null, 1, 'jill@harvard.edu','123456789','', 0],
            ['1','MIT', 'Card', 1, 1, 'jamal@harvard.edu','2000000','', 1],
        ];

        foreach($posts as $post) {
            $category = Category::where('name','=',$post[2])->first();

            $post = Post::create([
                'lost_or_found' => $post[0],
                'location' => $post[1],
                'category_id' => $category['id'],
                'lost_user_id' => $post[3],
                'found_user_id' => $post[4],
                'contact_email' => $post[5],
                'contact_phone' => $post[6],
                'discription' => $post[7],
                'claimed' => $post[8],
            ]);
        }
    }
}
