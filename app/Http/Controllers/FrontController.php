<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class FrontController extends Controller
{
    public function index() {
        $blogs = Blog::latest('created_at')->paginate(9);
        return view('front.index',compact('blogs'));
    }

    public function single_post($id) {
        $data = Blog::find($id);
        return view('front.single',compact('data'));
    }
}
