<?php 

use App\Category;


function get_categories() {
	return Category::orderBy("id", "desc")->get();
}

function get_category_from_already_created ($categories, $id) {
	$category = array();
	foreach($categories as $cat) {
		if($cat->id == $id) {
			$category = $cat;
		}
	}

	return $category;
}