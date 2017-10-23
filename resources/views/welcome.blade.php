<html>
    <head>
        <title>About</title>

    </head>
    <body>
        <h1> Hello <?= $name; ?> </h1>
        <h2>You have the following tasks</h2>
        <ul>
            @foreach ($tasks as $task)
                <li>{{ $task }} </li>
            @endforeach
        </ul>
    </body>
</html>