<!DOCTYPE html>
<html lang="en">
  <head>
   <title>{{$content->name}} - Название сайта</title>
  <meta name="description" content="{{$content->description}}">
   <link rel="stylesheet" href="/assets/bootstrap-4.4.1-dist/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/">Название сайта</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            @foreach($menu as $elementMenu)
            <a class="nav-item nav-link @if($elementMenu->url == $content->url) active @endif" href="/{{$elementMenu->url}}">{{$elementMenu->name}}</a>
            @endforeach
            </div>
          </div>
        </nav>
        @yield('content')
    </div>
    <script src="/assets/jquery-3.4.1.slim.min.js" ></script>
    <script src="/assets/popper.min.js"></script>
    <script src="/assets/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>