@extends("layouts.main", ["title" => __("titles.index")])

@section("content")

	@include("landing.components.header")

	@include("landing.components.columns")

	@include("landing.components.about")


@endsection