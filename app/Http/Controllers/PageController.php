<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    public function render_news (Request $req) {

    	return view("blog.index");

    }
}
