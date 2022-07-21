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
<body>
    <div class="w-screen navWeb h-14 flex md:px-20 justify-between z-20 px-5 items-center text-xl fixed top-0 bg-slate-200/30 backdrop-blur-md">
        <div class="flex items-center">
            <x-svg-logo height='25px' width="107px" />
            <x-svg-x width="13px" height="13px" class="mx-3" />
            <img src="/img/muscab.png" width="35px" alt="">
        </div>
        <div class="w-[30px] h-[30px] xl:hidden bg-red-500 grid place-items-center rounded-md">
            @livewire('admin.logout')
        </div>
        <div class="absolute left-0 px-5 top-14 h-10 items-center backdrop-blur-md bg-slate-600/80 lg:bg-transparent lg:relative lg:top-0 lg:w-auto lg:h-full snap-x scroll-smooth lg:backdrop-blur-0 w-screen sm:justify-center overflow-scroll flex space-x-5">
            <a href="{{ route('admin.dashboard') }}" class="scroll-ml-6 snap-start px-1 h-8 text-sm lg:text-slate-600/90 font-medium text-white focus:border lg:hover:text-slate-700 rounded-sm grid place-items-center">Dashboard</a>
            <a href="{{ route('admin.positions') }}" class="scroll-ml-6 snap-start px-1 h-8 text-sm lg:text-slate-600/90 font-medium text-white focus:border lg:hover:text-slate-700 rounded-sm grid place-items-center">Posisi</a>
            <a href="{{ route('admin.condidates') }}" class="scroll-ml-6 snap-start px-1 h-8 text-sm lg:text-slate-600/90 font-medium text-white focus:border lg:hover:text-slate-700 rounded-sm grid place-items-center">Kandidat</a>
            <a href="{{ route('admin.voters') }}" class="scroll-ml-6 snap-start px-1 h-8 text-sm lg:text-slate-600/90 font-medium text-white focus:border lg:hover:text-slate-700 rounded-sm grid place-items-center">Pemilih</a>
            <a href="{{ route('admin.votes') }}" class="scroll-ml-6 snap-start px-1 h-8 text-sm lg:text-slate-600/90 font-medium text-white focus:border lg:hover:text-slate-700 rounded-sm grid place-items-center">Hasil</a>
            <a href="{{ route('admin.setting') }}" class="scroll-ml-6 snap-start px-1 h-8 text-sm lg:text-slate-600/90 font-medium text-white focus:border lg:hover:text-slate-700 rounded-sm grid place-items-center">Pengaturan</a>
            <a href="{{ route('admin.change_password') }}" class="scroll-ml-6 snap-end px-1 whitespace-nowrap h-8 text-sm lg:text-slate-600/90 font-medium text-white focus:border lg:hover:text-slate-700 rounded-sm grid place-items-center">Ganti Passsword</a>
            <div class="hidden lg:flex ">
                @livewire('admin.logout')
            </div>
        </div>
    </div>
    {{ $slot }}
@livewireScripts
</body>
</html>