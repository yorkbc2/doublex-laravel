<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Post;

function returnWithMessage($status, $id=0, $idd="") {
    return redirect("/admin/index/blog?".$status."&cat_id=".$id.$idd);
}

class BlogController extends Controller
{
    public function add_category(Request $req) {
    	$title = $req->category_title;
    	$desc  = $req->category_description;
    	$alt_link = $req->category_alt_link;

    	function insertNewCategory ($ttl, $dsc, $alt) {
    		$id = Category::insertGetId([
    			"title" => $ttl,
    			"description" => $dsc,
    			"alt_link" => $alt,
    			"created_at" => date("Y-m-d H:i:s")
    		]);
    		return $id;
    	}

    	

    	if($alt_link) {

    		$check_category = Category::where("alt_link", "=", $alt_link)
    			->first();

    		if(isset($check_category->title)) {

    			return returnWithMessage("error=1&success=0&tab=add-category", 0, "#add-category");

    		}
    		
    		else {
    			$id = insertNewCategory($title, $desc, $alt_link);
    			return returnWithMessage("success=1&tab=add-category", $id, "#add-category");
    		}

    	}
    	else {
    		$id = insertNewCategory($title, $desc, "");
    		return returnWithMessage("success=1&tab=add-category", $id, "#add-category");
    	}

    }



    public function add_post(Request $req) {


    	$title    = $req->post_title;
    	$content  = $req->post_content;
    	$image    = $req->post_main_image;
    	$tags     = $req->post_tags;
    	$alt      = $req->post_alt;
    	$category = $req->post_category;
    	$status   = $req->post_status;

    	$img_name = NULL;


    	$post = Post::where("alt_link", "=", $alt)->first();

    	if(isset($post->title) AND isset($post->content)) {

    		return returnWithMessage("error=1&success=0&tab=add-post", 0, "#add-post");

    	}

    	else {

    		if($req->hasFile("post_main_image")) {
    			$img_ext  = $image->getClientOriginalExtension();
    			$img_name = md5($image->getClientOriginalName()).".".$img_ext;
    			$image->move(public_path()."/uploads", $img_name);

                $img_name = "/uploads/".$img_name;
    		}

    		$id = Post::insertGetId([
    			"title" => $title,
    			"content" => $content,
    			"main_image" => $img_name,
    			"alt_link" => $alt,
    			"category_id" => $category,
    			"tags" => $tags,
    			"status" => intval($status),
    			"created_at" => date("Y/m/d H:i:s"),
    			"views" => 0
    		]);


    		return returnWithMessage("success=1&tab=add-post", $id, "#add-post");



    	}

    	


    }
}
