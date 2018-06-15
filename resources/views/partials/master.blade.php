<!DOCTYPE html>
<html lang="en">
@include ('partials.head')

<body>
@include ('partials.nav')

@if($flash = session('message'))
    <div id="flash-message" class="alert alert-success" role="alert">
        {{ $flash }}
    </div>
    @endif

@include ('partials.header')

<div class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            @yield ('content')
        </div><!-- /.blog-main -->
        @include ('partials.sidebar')
    </div><!-- /.row -->
</div><!-- /.container -->

@include ('partials.footer')
</body>
</html>
