<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@if(isset($content)){{$content->name}}@else {{$title}}  @endif - {{$site->name}}</title>
    <meta name="description" content="@if(isset($content)){{$content->description}}@else{{$description}}@endif">
    <link rel="stylesheet" href="/assets/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link href="/assets/iconfont/material-icons.css" rel="stylesheet">
    <script src="/assets/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#textarea'
      });
    </script>
</head>

  <body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/">{{$site->name}}</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            </div>
			<!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin">Админка</a>
                                </li>
				<!-- Authentication Links -->
				@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('auth.Login') }}</a>
					</li>
					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
						</li>
					@endif
				@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
								{{ __('auth.Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
				@endguest
			</ul>
        </nav>
<ul class="nav nav-pills nav-admin-menu">
    <a class="nav-link @if(Route::current()->getName() == 'adminIndex') active @endif" href="/admin">Страницы сайта</a>
    @if(Route::current()->getName() == 'adminStaticPageCreate')<i class="material-icons">forward</i><a class="nav-link active" href="/admin/static-page/create/show/">Создать страницу</a>@endif
    @if(Route::current()->getName() == 'adminStaticPageEdit')<i class="material-icons">forward</i><a class="nav-link active" href="/admin/static-page/create/show/">Редактировать страницу</a>@endif
  </li>
</ul>
        @yield('content')
    </div>
    <script src="/assets/jquery-3.4.1.slim.min.js" ></script>
    <script src="/assets/popper.min.js"></script>
    <script src="/assets/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>