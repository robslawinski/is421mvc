<html>
<head>
    <title>Index</title>

</head>
<body>
<h2>You have the following tasks</h2>
<ul>
    @foreach ($tasks as $task)
        <a href="/tasks/{{task->id}}">
            <li>{{ $task->body }} </li>
        </a>

    @endforeach
</ul>
</body>
</html>