<?php
/**
 * Created by PhpStorm.
 * User: wenjiang
 * Date: 11/23/16
 * Time: 9:23 AM
 */

namespace P4\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('P4.view');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('P4.create');
    }

    public function addNewPost(Request $request)
    {
        if ($request->__isset('random')) {
            $length = rand(0, 99);
        } else {

            $validator = Validator::make($request->all(), [
                'length' => 'required|between:0,99|numeric'
            ]);

            if ($validator->fails()) {
                return redirect('loremipsumgenerator')->withErrors($validator)->withInput();
            }

            $length = $request->input('length');
        }

        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs($length);

        return view('P3.result', [
            'paragraphs' => $paragraphs,
            'length' => trim($length)
        ]);
    }

}