<?php
/**
 * Created by PhpStorm.
 * User: wenjiang
 * Date: 11/23/16
 * Time: 9:23 AM
 */

namespace P4\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use P4\Category;
use P4\Tag;
use P4\Post;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * create a new post
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check() ) {
            Session::flash('flash_message','You have to be logged in to create a new book');
            return redirect('/');
        }

        $categories = Category::all();
        $tags = Tag::all();
        return view('P4.create',[
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * save the new post to db
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request)
    {
        $validator = $this->validateRequest($request);

        if ($validator->fails()) {
            return redirect('posts/create')->withErrors($validator)->withInput();
        } else {

            $post = $this->createPostObject(new Post(), $request);
            $post->save();

            foreach($request->input('tag') as $tag) {
                $tag = Tag::where('id','=',$tag)->first();
                if (isset($tag)) {
                    $post->tags()->save($tag);
                    Session::flash('flash_message','Your post was saved');
                } else {
                    Session::flash('flash_message','Error Happened! Tags weren\'t saved successfully');
                }
            }

            return redirect('/posts/view');
        }
    }

    /**
     * get all posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllPosts() {
        $posts = Post::with('tags')->all();
        return view('P4.posts', [
            'posts' => $posts,
        ]);
    }

    /**
     * edit a post
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id) {
        $post = Post::with('tags')->find($id);
        $tags = Tag::all();
        $checkedTagIds = [];
        foreach($post->tags as $currentTag) {
            $checkedTagIds[] = $currentTag['id'];
        }
        if ($post) {
            return view('P4.edit', [
                'categories' => Category::all(),
                'post' => $post,
                'tags' => $tags,
                'checkedTags' => $checkedTagIds
            ]);
        } else {
            Session::flash('flash_message','No post associate with this id');
            return redirect('/posts/view');
        }
    }

    /**
     * update post to db
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {
        $validator = $this->validateRequest($request);

        $post = Post::find($id);

        if ($validator->fails()) {
            return redirect('posts/edit/'.$request->input('id'))->withErrors($validator)->withInput();
        } elseif ($post) {
            $post->tags()->sync($request->input('tag')); // sync pivot post tag table
            $post = $this->createPostObject($post, $request);
            $post->save();
            Session::flash('flash_message','Your post was updated');
        }
        return redirect('/posts/view');
    }

    /**
     * delete a post
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Request $request) {
        $post = Post::find($request->input('id'));

        if ($post) {
            $post->delete();
            Session::flash('flash_message','Your post was deleted');
        } else {
            Session::flash('flash_message','Error');
        }

        return redirect('/posts/view');
    }

    /**
     * claim a post
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function claim(Request $request) {
        $post = Post::find($request->input('id'));

        if ($post->claimed == 1)
        {
            Session::flash('flash_message','This was already claimed by another person');
        } elseif ($post) {
            if ($post->lost_or_found == 0) {
                $post->found_user_id = Auth::id();
            } else {
                $post->lost_user_id = Auth::id();
            }
            $post->claimed = 1;

            $post->save();

            Session::flash('flash_message','This was claimed by you');

        }
        return redirect('/posts/view');
    }

    /**
     * check all current posts
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view() {
        $posts = Post::all();
        return view('P4.posts', [
            'posts' => $posts
        ]);

    }

    /**
     * validate request input
     *
     * @param Request $request
     * @return mixed
     */
    private function validateRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lostorfound' => 'required',
            'location' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'discription' => 'required',
        ]);
        return $validator;
    }

    /**
     * @param Request $request
     * @return Post
     */
    private function createPostObject($post, Request $request)
    {
        $category = Category::where('id', '=', $request->input('categories'))->first();

        if ($request->input('lostorfound') == 'lost') {
            $post->lost_or_found = 0;
            $post->lost_user_id = Auth::id();
        } else {
            $post->lost_or_found = 1;
            $post->found_user_id = Auth::id();
        }
        $post->location = $request->input('location');
        $post->category()->associate($category);
        $post->contact_email = $request->input('email');
        $post->contact_phone = $request->input('phone');
        $post->discription = $request->input('discription');
        $post->claimed = 0;
        return $post;
    }
}