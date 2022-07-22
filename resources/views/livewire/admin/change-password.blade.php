<div class="bg-[url('../img/hero-60.png')] min-h-screen bg-slate-400">
    <x-slot name='title'>
        Ganti Password
    </x-slot>
    <div class="w-screen pt-[130px] px-5 pb-[50px] flex justify-center items-center">
        <div class="w-full sm:w-3/5 lg:w-1/3 h-[500px] bg-slate-300 relative rounded-md flex flex-col items-center justify-center space-y-5">
            @if (session()->has('success'))
                <div class="flex absolute top-10 w-full h-12 mb-3 justify-center items-center">
                    <div class="w-10/12 md:w-3/4  h-full bg-green-500 text-white px-5 sm:px-10 flex items-center justify-start rounded-md">
                        <x-svg-check  width="18px" height="18px"/>
                        &nbsp; &nbsp;
                        <h3 class="text-sm capitalize">{{ session('success') }}</h3>
                    </div>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="flex absolute top-10 w-full h-12 mb-3 justify-center items-center">
                    <div class="w-10/12 md:w-3/4  h-full bg-red-500 text-white px-10 flex items-center justify-start rounded-md">
                        <x-svg-warning  width="18px" height="18px"/>
                        &nbsp; &nbsp;
                        <h3 class="text-sm capitalize">{{ session('error') }}</h3>
                    </div>
                </div>
            @endif
            <h3 class="text-2xl font-bold">Ganti Password</h3>
            <form wire:submit.prevent='changePassword' class="w-10/12 md:w-3/4 flex flex-col justify-center">
                <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Username</span>
                    <input type="text" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"  placeholder="Username" wire:model='username' autofocus/>
                    @error('username')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block mt-3">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">New Password</span>
                    <input type="password" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" wire:model='password' placeholder="******"/>
                    @error('password')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <button type="submit" class="bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 active:bg-sky-700 px-5 py-2 mt-10 text-sm leading-5 rounded-md font-semibold text-white">
                    Ganti Password
                </button>
            </form>
        </div>
    </div>
</div>
