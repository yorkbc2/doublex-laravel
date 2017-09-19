<?php

/*
	Routes for website correct working
*/

Route::get('/', function () {
	App::setLocale("ua");

    return view("landing.index");
});

Route::get("/{lang}", function ($lang) {
	switch($lang) {
		case "ru" :
			App::setLocale("ru");
			break;
		case "ua" :
			App::setLocale("ua");
			break;
		case "en" :
			App::setLocale("en");
			break;
		default :
			App::setLocale("ua");
			break;
	}

	return view("landing.index");
})->where("lang", ".*");

Route::get("/news", "PageController@render_news");

Route::get("/news/post/{postUrl}", "BlogController@get_post")->where("postUrl", ".*");

Route::get("/news/category/{categoryUrl}", "BlogController@get_posts_by_category")
	->where("categoryUrl", ".*");

Route::get("/news/tag/{tagUrl}", "BlogController@get_post_by_tag")->where("tagUrl", ".*");






/*
	Routes for Admin post and get queries


*/



	// POST ROUTES

Route::post("/admin/login", "AdminController@login_post");

Route::post("/admin/index/api/v1/add-category", "BlogController@add_category");

Route::post("/admin/index/api/v1/add-post", "BlogController@add_post");

	// GET ROUTES

Route::get("/admin/login", "AdminController@login");

Route::get("/admin/index", "AdminController@index_page");

Route::get("/admin/index/{page}", "AdminController@render_page")->where("page", ".*");
