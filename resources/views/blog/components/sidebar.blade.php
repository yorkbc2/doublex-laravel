<div class="search-box">
	<div class="search-box--input">
		<form action="/news/search" method="get">
			<i class="fa fa-search search-input--icon"></i>
			
			<input type="search" class='search-input' list="posts"
			placeholder="Пошук..." name="q">

			<datalist id="posts">
				@foreach(get_posts() as $post)

				<option value="{{$post->title}}">

				@endforeach
			</datalist>

			<button type="submit" class="search-input--submit">
				<i class="fa fa-arrow-right"></i>
			</button>

		</form>
	</div>
</div>

<div class="subscribe-box">
	<!-- Subscribe block here -->
</div>