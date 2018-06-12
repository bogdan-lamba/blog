<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link " href="/">All posts</a>{{--class active--}}

            {{--<a class="nav-link " href="{{URL::asset('/')}}">home</a>--}}{{--class active--}}{{--
            <a class="nav-link " href="{{URL::asset('/posts/create')}}">create</a>--}}{{--class active--}}
            <a class="nav-link " href="/posts/create">Create post</a>

            @if (Auth::check())
                <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                <a class="nav-link" href="/logout"><i>Logout</i></a>
            @else
                <a class="nav-link" href="/login">Sign In</a>
            @endif
        </nav>
    </div>
</div>