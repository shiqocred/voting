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
<body class="w-screen">
    <div class="w-screen h-14 flex md:px-20 lg:justify-between justify-between px-5 backdrop-blur-md items-center text-xl fixed top-0 bg-slate-200/30 text-slate-600 z-20">
        @guest    
            <div class="flex">
                <x-svg-logo height='30px' width="128px" />
            </div>
        @endguest
        @auth    
            <div class="flex items-center">
                <x-svg-logo class="h-[25px] sm:h-[30px] w-[107px] sm:w-[128px]" />
                <x-svg-x class="mx-2 sm:mx-5 w-[12px] sm:w-[15px] h-[12px] sm:h-[15px]" />
                <img src="img/muscab.png" class="w-[35px] sm:w-[40px] h-[35px] sm:h-[40px]" alt="">
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