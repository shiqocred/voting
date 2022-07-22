<div>
    <x-slot name='title'>
        Login
    </x-slot>
    <x-slot name='image_title'>
        Login
    </x-slot>
    <div class="w-screen h-screen bg-[url('../img/hero.png')] bg-slate-400 flex justify-center items-center pt-14">
        <div class="xl:w-5/12 lg:h-[80%] lg:w-4/12 hidden bg-slate-200 rounded-l-lg lg:flex flex-col justify-center items-center relative">
            @if ($time_polling_start >= $date_now)
                <span class="w-11/12 rounded-md text-white flex bg-slate-400/50 h-12 absolute top-4 items-center justify-center space-x-2" wire:poll.60000ms>
                    <span>Next Election</span>  <span class="py-[3px] rounded-md px-2 bg-red-600">{{ $time_to_start }}</span> 
                </span>
            @endif
            @if ($time_polling_start <= $date_now)
                @if ($time_polling_end >= $date_now)    
                    <span class="w-11/12 rounded-md text-white flex bg-slate-400/50 h-12 absolute top-4 items-center justify-center space-x-2" wire:poll.60000ms>
                        <span>Election Time</span> <span class="py-[3px] px-2 rounded-md bg-green-600">{{ $time_to_end }}</span>
                    </span>
                @endif
            @endif
            @if ($time_polling_end <= $date_now)
                <span class="w-11/12 rounded-md text-white flex bg-slate-400/50 h-12 absolute top-4 items-center justify-center" wire:poll.60000ms>
                    No Time Election
                </span>
            @endif
            <x-svg-vote-ill width="70%" height="70%" />
            <span class="w-11/12 rounded-md text-white bg-slate-400/50 h-12 absolute bottom-4 grid place-items-center" wire:poll.60000ms>
               {{$name_election}}
            </span>
        </div>
        <div class="lg:h-[80%] lg:w-4/12 md:w-8/12 h-[500px] w-11/12 bg-slate-600/60 backdrop-blur-md rounded-r-lg">
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
                <div class="w-full flex h-[50px] justify-center mt-8 lg:mt-14 mb-3 items-center space-x-3">
                    <x-svg-logo-vote/>
                    <x-svg-x width="20px" height="20px" />
                    <img src="/img/muscab.png" width="50px" alt="">
                </div>
                <h3 class="text-2xl text-white font-bold mb-5">LOGIN</h3>
                <form wire:submit.prevent='login' class="w-5/6 flex flex-col justify-center">
                    <label class="block">
                        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-white">Vote Id</span>
                        <input type="text" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"  placeholder="Vote Id" wire:model='vote_id'/>
                        @error('vote_id')
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
    </div>
</div>