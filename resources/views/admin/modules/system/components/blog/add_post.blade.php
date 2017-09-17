<div id="add-post">
	<h4>
		Добавить новость
	</h4>
	<hr>
	<p>
		Здесь Вы можете добавить новость на сайт, выбрать для неё категорию и прочее.
	</p>

	@isset($_GET["tab"])

								@if($_GET["tab"] == "add-post")

									@isset($_GET["success"])
										@if($_GET["success"] == 1)
										
										<div class="alert-success alert">
											Новость успешно добавлена! 
										</div>

										@elseif($_GET["error"] == 1)
										<div class="alert alert-danger">
											<strong>Ошибка!</strong> Новость не добавлена !
										</div>
										@endif

									@endisset

								@endif

							@endisset

	<form action="/admin/index/api/v1/add-post" 
									method="post" 
									class="form-field"
									enctype="multipart/form-data">

									{{csrf_field()}}
									
									<div class="form-group">
										<label for="post-title">
											Заголовок:
										</label>
										<input type="text" name="post_title" required placeholder="Заголовок новости" id="post-title" class="form-control">
									</div>

									<div class="form-group">
										<label for="post-category">
											Категория поста:
										</label>
										<select name="post_category" class='form-control' id="post-category">
											@foreach(get_categories() as $category) 
											
											<option value="{{$category->id}}">
												{{$category->title}}
											</option>

											@endforeach
										</select>
									</div>

									
									<div class="form-group">
										<label for="post-content">
											Контент новости:
										</label>
										<textarea name="post_content" id="post-content" class="form-control" required placeholder="Контент статтьи здесь"></textarea>
									</div>

									<div class="form-group">
										<label for="post-main-image">
											Обложка новости:
										</label>
										<input type="file" name="post_main_image" required placeholder="Обложка новости" id="post-main-image" class="form-control">
									</div>

									<div class="form-group">
										<label for="post-tags">
											Теги (через запятую):
										</label>
										<input type="text" name="post_tags" placeholder="Теги новости" id="post-tags" class="form-control">
										<small class="text-muted form-text">
											Например: картина,Ван Гог,ещё тег,исскувство
										</small>
									</div>

									<div class="form-group">
										<label for="post-alt">
											Альтернативная ссылка:
										</label>
										<input id="post-alt" type="text" name="post_alt" placeholder="Альтернативаня ссылка" class="form-control">
										<small class="text-muted form-text">
											Нужно, что бы ссылка на новость выглядела ярче, например: Вместо обычного /post/1, будет /post/make-your-life-better.
										</small>
									</div>

									<div class="form-group">
										<p>
											Статус новости:
										</p>
										<input type="radio" id='status-true' name="post_status" value="1" checked> <label for="status-true">
											Публичная (Видна всем)
										</label>
										<br>
										<input type="radio" id='status-false' name='post_status' value="0"> <label for="status-false">
											Скрытая (Никто не может её прочитать)
										</label>
									</div>

									<div class="form-group">
										<button class="btn-default btn">
											Добавить +
										</button>
									</div>


								</form>

</div>