<div class="blog-post">
    <h2 class="blog-post-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
    <p class="blog-post-meta">
        by <i>{{ $post->user->name }}</i> on
        {{ $post->created_at->toFormattedDateString() }} {{--<a href="#">Mark</a>--}}
    </p>
    {{--carbon library for date--}}

    {{ $post->body }}
</div><!-- /.blog-post -->
