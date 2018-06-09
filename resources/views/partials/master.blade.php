<!DOCTYPE html>
<html lang="en">
  @include ('partials.head')

  <body>
    @include ('partials.nav')
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
