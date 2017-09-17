<div id="add-category">
							<h4>
								Добавить рубрику
							</h4>
							<hr>

							<p>
								Здесь вы можете добавить рубрику для Ваших новостей, например: Спорт или Политика. Старайтесь добавлять только те рубрики, которых ещё нету на сайте.
							</p>

							@isset($_GET["tab"])

								@if($_GET["tab"] == "add-category")

									@isset($_GET["success"])
										@if($_GET["success"] == 1)
										
										<div class="alert-success alert">
											Категория успешно добавлена! 
										</div>

										@elseif($_GET["error"] == 1)
										<div class="alert alert-danger">
											<strong>Ошибка!</strong> Категория не добавлена !
										</div>
										@endif

									@endisset

								@endif

							@endisset

							<div>
								<form 
									action="/admin/index/api/v1/add-category" 
									class="form-field"
									method="post">

									{{csrf_field()}}
									
									<div class="form-group">
										<label for="category-title">
											<i style="color: red;">
												*
											</i> Название новой категории:
										</label>
										<input type="text" 
											id="category-title" 
											name="category_title" 
											required 
											placeholder="Название категории" 
											class="form-control">
									</div>

									<div class="form-group">
										<label for="category-description">
											Описание категории (оптимально) :
										</label>
										<textarea 
											name="category_description"
											id="category-description"
											class="form-control"
											placeholder="Описание категории здесь..."
											maxlength="340"></textarea>
									</div>

									<div class="form-group">
										<label for="category-alt-link">
											Альтернативная ссылка (оптимально) :
										</label>
										<input type="text"
											name="category_alt_link"
											id='category-alt-link'
											placeholder="Например, sport (если категория называется 'Спорт'"
											maxlength="20"
											class="form-control">
										<small class='form-text text-muted'>
											Нужно для замены обычного URL (/category/1) на "Красивый URL" (/category/sport)
											<br>	
											Нельзя использовать нижнее подчеркивание и все символы, кроме тире.
										</small>
									</div>
									<div class="form-group">
										<button class="btn btn-default"
										type="submit">
											Добавить +
										</button>
									</div>

								</form>
							</div>

						</div>