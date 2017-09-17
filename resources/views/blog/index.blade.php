@extends("blog.layout", ["title" => "Новини"])

@section("inside")

	@php 
		$latest_posts_for_slider = get_posts_with_images(3);
		$categories = get_categories();
	@endphp

			<div id="carousel" class="carousel slide" data-ride="carousel"
					style="height: 320px!important; overflow: hidden; position: relative;">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				  @foreach($latest_posts_for_slider as $index => $ps)
				    <li data-target="#carousel" data-slide-to="{{$index}}" 
				    @if($index == 0)
				    	class="active"
				    @endif
				    ></li>
				  @endforeach
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				  @foreach($latest_posts_for_slider as $index => $ps)
				    <div 
				    @if($index === 0)
				    	class="item active"
				    @else 
				    	class="item"
				    @endif

				    style="height: 320px;">


				      <img width="100%" height="auto" src="{{$ps->main_image}}" alt="Картинку не знайдено!" title="{{$ps->title}}">

				      <div class="carousel-caption">
				      	<h3>
				      		<a 
				      		@if($ps->alt_link)
				      			href="/news/post/{{$ps->alt_link}}"
				      		@else
				      			href="/news/post/{{$ps->id}}"
				      		@endif>
				      			{{$ps->title}}
				      		</a>
				      	</h3>
				      </div>

				    </div>
				   @endforeach
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#carousel" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				    <span class="sr-only">Next</span>
				  </a>
			</div>
			
			<h2 class="blog-header">
				Найпопулярніші новини:
			</h2>

			<div class="popular-news">
				@foreach(get_popular_posts(3) as $post)

					<div class="popular-item">
						<div class="popular-item--header">
							@php 

							$c = get_category_from_already_created($categories, $post->category_id);

							@endphp

							<a href="/news/category/{{$c->id}}">
								{{$c->title}}
							</a>

						</div>
						@if($post->main_image)
						<div class="popular-item--image">
							<img src="{{$post->main_image}}" alt="Картинка не знайдена" title="{{$post->title}}">
						</div>
						@endif

						<div class="popular-item--title">
							<div class="popular-item--commentaries">
								0
							</div>

							<h2>
								<a href="{{get_post_link($post)}}">
									{{$post->title}}
								</a>
							</h2>
						</div>

						<div class="popular-item--footer">
							<span class="popular-footer--date">
								{{$post->created_at}}
							</span>
						</div>

					</div>

				@endforeach
			</div>

@endsection