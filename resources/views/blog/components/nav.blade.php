<div class="categories">
	<ul>
		@foreach(get_categories() as $category)

		<li>
			
			<a 
				@if($category->alt_link)
					href="/news/category/{{$category->alt_link}}"
				@else
					href="/news/category/{{$category->id}}"
				@endif
			>
				{{$category->title}}
			</a>

		</li>

		@endforeach
	</ul> 
</div>