<!doctype html>
<html>
<head>
    <title>Tasks</title>
</head>
<body>


<br>

<ul>
    @foreach ($tasks as $task){{--blade syntax--}}
        <li>
            <a href="/tasks/{{ $task->id }}">
                {{ $task->body }}
            </a>
        </li>
    @endforeach
</ul>
</body>
</html>