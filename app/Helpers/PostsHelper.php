<?php 

use App\Post;

function get_posts () {
	return Post::where("status", "=", 1)->get();
}

function get_posts_with_images ($limit = 10) {

	return Post::where("main_image", "!=", NULL)
		->limit($limit)->orderBy("id", "desc")->get();

}

function get_popular_posts($limit = 10) {
	return Post::where([
		["status", "=", 1]
	])->orderBy("views", "desc")->limit($limit)->get();
}

function get_post_link ($post) {
	if($post->alt_link) {
		return $post->alt_link;
	}
	else {
		return $post->id;
	}
}