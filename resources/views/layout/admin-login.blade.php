<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voting || {{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="../img/muscab.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="w-screen bg-[url('../img/hero.png')] bg-slate-400 h-screen">
    {{ $slot }}
@livewireScripts
</body>
</html>