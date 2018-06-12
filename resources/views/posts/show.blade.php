@extends ('partials.master')

@section ('content')
	<H1>{{ $post->title }}</H1>
	{{ $post->body }}

    <hr>
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{ $comment->created_at->diffForHumans() }}
                    </strong>
                    {{ $comment->body }}
                </li>
                @endforeach
        </ul>
    </div>
    <hr>

    {{--Add a comment --}}
    @if (auth()->check())
    <div class="card">
        <div class="card-block">
            <form method="POST" action="/posts/{{ $post->id }}/comments">
                {{ csrf_field() }}

                <div class="form-group">
                    <textarea name="body" placeholder="Your comment here." class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add comment</button>
                </div>

                @include ('partials.errors')

            </form>
        </div>
    </div>
    @endif


@endsection