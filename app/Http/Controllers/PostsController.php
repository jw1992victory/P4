<?php
/**
 * Created by PhpStorm.
 * User: wenjiang
 * Date: 11/23/16
 * Time: 9:23 AM
 */

namespace P4\Http\Controllers;


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

}