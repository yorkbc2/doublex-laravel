@extends("layouts.main", ["title" => $title])

@section("content")

	@include("layouts.components.header")

	<div class="container pad">
		<div class="row">
			<div class="col-md-4">
				<div class="logo">
					<h1 style="padding: 15px 0">
						<a href="/news" style="color: #388e3c; text-decoration: none;">
							Бердичів.Новини
						</a>
					</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				@include("blog.components.nav")
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				@yield("inside")
			</div>
			<div class="col-md-4">
				@include("blog.components.sidebar")
			</div>
		</div>
	</div>

@endsection