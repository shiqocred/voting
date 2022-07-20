<div>
    <x-slot name='title'>
        Login
    </x-slot>
    
    <div class="w-screen h-screen flex justify-center items-center">
        <div class="xl:w-5/12 xl:h-[80%] md:w-6/12 h-[500px] w-11/12 bg-slate-600/60 backdrop-blur-md rounded-lg">
            <div class="w-full h-full flex flex-col justify-center items-center relative">
                @if (session()->has('error'))
                    <div class="flex w-full h-12 -mt-10 justify-center items-center">
                        <div class="w-3/4 h-full bg-red-500 text-white px-6 flex items-center justify-start rounded-md">
                            <x-svg-warning  width="18px" height="18px"/>
                            &nbsp; &nbsp;
                            <h3 class="text-sm capitalize">{{ session('error') }}</h3>
                        </div>
                    </div>
                @endif
                <div class="w-full flex h-[50px] justify-center mt-8 xl:mt-14 mb-3 items-center space-x-3">
                    <x-svg-logo-vote/>
                    <x-svg-x width="20px" height="20px" />
                    <img src="/img/muscab.png" width="50px" alt="">
                </div>
                <h3 class="text-2xl text-white font-bold mb-5">ADMIN LOGIN</h3>
                <form wire:submit.prevent='login' class="w-5/6 flex flex-col justify-center">
                    <label class="block">
                        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-white">Username</span>
                        <input type="text" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"  placeholder="Username" wire:model.lazy='username'/>
                        @error('username')
                            <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="block mt-3">
                        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-white">Password</span>
                        <input type="password" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" wire:model='password' placeholder="******"/>
                        @error('password')
                            <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                        @enderror
                    </label>
                    <button type="submit" class="bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 active:bg-sky-700 px-5 py-3 mt-10 text-sm leading-5 rounded-md font-semibold text-white">
                        LOGIN
                    </button>
                </form>
            </div>
        </div>
        {{-- <div class="w-1/3 h-[500px] bg-slate-300 relative rounded-md flex flex-col items-center justify-center space-y-5">
            @if (session()->has('error'))
                <div class="flex absolute top-10 w-full h-12 mb-3 justify-center items-center">
                    <div class="w-3/4 h-full bg-red-500 text-white px-10 flex items-center justify-start rounded-md">
                        <x-svg-warning  width="18px" height="18px"/>
                        &nbsp; &nbsp;
                        <h3 class="text-sm capitalize">{{ session('error') }}</h3>
                    </div>
                </div>
            @endif
            <h3 class="text-2xl font-bold">ADMIN LOGIN</h3>
            <form wire:submit.prevent='login' class="w-2/3 flex flex-col justify-center">
                <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Username</span>
                    <input type="text" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"  placeholder="Username" wire:model='username' autofocus/>
                    @error('username')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block mt-3">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Password</span>
                    <input type="password" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" wire:model='password' placeholder="******"/>
                    @error('password')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <button type="submit" class="bg-violet-500 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 active:bg-violet-700 px-5 py-2 mt-10 text-sm leading-5 rounded-md font-semibold text-white">
                    Login
                </button>
            </form>
        </div> --}}
    </div>
</div>
