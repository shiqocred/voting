<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voting || {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="w-screen">
    <div class="w-screen h-14 flex md:px-20 lg:justify-between justify-between px-5 items-center text-xl fixed top-0 bg-slate-200/30 text-slate-600">
        @guest    
            <div class="flex">
                <x-svg-logo height='30px' width="128px" />
            </div>
        @endguest
        @auth    
            <div class="flex items-center">
                <x-svg-logo height='30px' width="128px" />
                <x-svg-x width="15px" height="15px" class="mx-5" />
                <img src="img/muscab.png" width="40px" alt="">
            </div>
        @endauth
        <div class="px-3 py-1 hidden lg:flex bg-slate-100/70 rounded-sm">
            {{ $image_title }}
        </div>
        @auth
        <div class="flex">
            @livewire('frontend.logout')
        </div>
        @endauth
        
    </div>
    {{ $slot }}
@livewireScripts
</body>
</html>