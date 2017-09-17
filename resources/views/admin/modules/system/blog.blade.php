@extends("admin.layouts.clean", ["title" => "Управление блогом"])

@php 

$comp_dir = "admin.modules.system.components";

@endphp

@section("app")

	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Управление блогом
					</div>
					<div class="panel-body">
						<div>
							<h3>
								Быстрая навигация
							</h3>
							<ul>
								<li>
									<a href="#add-category">
										Добавить рубрику
									</a>
								</li>
								<li>
									<a href="#add-post">
										Добавить новость
									</a>
								</li>
								<li>
									<a href="#posts">
										Все новости
									</a>
								</li>
							</ul>
						</div>

						
						@include($comp_dir.".blog.add_category")

						@include($comp_dir.".blog.add_post")


					</div>
				</div>
			</div>
		</div>
	</div>

@endsection


{{--  --}}