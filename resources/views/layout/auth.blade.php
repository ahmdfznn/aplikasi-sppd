<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <script src="{{ url('js/jquery.js') }}"></script>
    <style>
        body {
            overflow-x: hidden;
            overflow-y: hidden;
        }
    </style>
</head>

<body class="flex justify-center items-center w-screen h-screen bg-green-400">
    <main class="p-10 pt-24 relative bg-white rounded-lg flex flex-col items-center justify-evenly">
        {{ $slot }}
    </main>
</body>

</html>
