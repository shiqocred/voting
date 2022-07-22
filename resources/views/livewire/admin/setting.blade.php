<div class="bg-[url('../img/hero-60.png')] min-h-screen bg-slate-400">
    <x-slot name='title'>
        Setting
    </x-slot>
    <div class="w-screen  flex justify-center pt-[130px] px-5 pb-[50px] md:px-0">
        <div class="w-full sm:w-3/5 lg:w-1/3 h-[730px] bg-slate-300 relative  rounded-md flex flex-col items-center justify-center space-y-5">
            @if (session()->has('success'))
                <div class="flex w-full h-12 mb-3 justify-center items-center">
                    <div class="w-10/12 md:w-3/4 h-full bg-green-500 text-white px-5 sm:px-10 flex items-center justify-start rounded-md">
                        <x-svg-check  width="18px" height="18px"/>
                        &nbsp; &nbsp;
                        <h3 class="text-sm capitalize">{{ session('success') }}</h3>
                    </div>
                </div>
            @endif
            <h3 class="text-2xl font-bold">SETTING</h3>
            <form wire:submit.prevent='updateSetting({{ $setting_id }})' class="w-10/12 md:w-3/4 flex flex-col justify-center">
                <label class="block mt-3">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Election Name</span>
                    <input type="text" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" 
                    wire:model='home_name' 
                    placeholder="Home name"/>
                    @error('home_name')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <span class="mt-3 text-sm font-medium text-slate-700">From</span>
                <div class="w-full h-[1px] bg-slate-400 mt-1"></div>
                <label class="block mt-3">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Election Date</span>
                    <input type="date" class="mt-1 px-3 py-2 flex items-center bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-full rounded-md sm:text-sm focus:ring-1" 
                    wire:model='election_date_start' 
                    max="{{ $election_date_end }}"
                    placeholder="dd/mm/yy"/>
                    @error('election_date_start')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block mt-3">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Election Start</span>
                    <input type="time" class="mt-1 px-3 py-2 bg-white border flex items-center shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-full rounded-md sm:text-sm focus:ring-1" 
                    wire:model='election_start'/>
                    @error('election_start')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <span class="mt-3 text-sm font-medium text-slate-700">To</span>
                <div class="w-full h-[1px] bg-slate-400 mt-1"></div>
                <label class="block mt-3">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Election Date</span>
                    <input type="date" class="mt-1 px-3 py-2 flex items-center bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-full rounded-md sm:text-sm focus:ring-1" 
                    wire:model='election_date_end' 
                    min="{{ $election_date_start }}"
                    placeholder="dd/mm/yy"/>
                    @error('election_date_end')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block mt-3">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Election End</span>
                    <input type="time" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 flex items-center w-full rounded-md sm:text-sm focus:ring-1" 
                    wire:model='election_end' />
                    @error('election_end')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <button type="submit" class="bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 active:bg-sky-700 px-5 py-2 mt-10 text-sm leading-5 rounded-md font-semibold text-white">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
