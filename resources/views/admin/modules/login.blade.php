@extends("admin.layouts.clean", ["title" => "Вход в админ-панель"])

@section("app")

    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @isset($error_message)
                            <div class="alert alert-danger">
                                {!! $error_message !!}
                            </div>
                            @endisset
                        <form action="/admin/login" method="post" class="form-field">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="">Логин:</label>
                                <input name="login" type="text" class="form-control" required placeholder="Введите логин администратора">
                            </div>
                            <div class="form-group">
                                <label for="">Пароль:</label>
                                <input name='password' type="password" class="form-control" required placeholder="Введите пароль администратора">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    Войти
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection