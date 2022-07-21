<div class="bg-[url('../img/hero-60.png')] min-h-screen bg-slate-400">
    <x-slot name='title'>
        Position
    </x-slot>
    <div class="flex w-screen justify-center pt-[130px] lg:pt-12 items-center">
        <div class="w-11/12 h-16 rounded-md flex px-5 md:px-10 md:w-4/5 lg:my-10 mb-5 items-center justify-between bg-slate-300">
            <h3 class="text-xl font-semibold uppercase">{{ __('Posisi ') }} : {{ $total }}</h3>
            <button class="bg-violet-500 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 active:bg-violet-700 text-sm h-10 w-20 rounded-md font-semibold text-white" wire:click='showForm'>New</button>
        </div>
    </div>
    @if ($showTable == true)
    <div class="w-full flex justify-center mb-5">
        <div class="w-11/12 md:w-4/5 flex justify-end relative">
            <div class="w-full md:w-1/2 lg:w-5/12 relative">
                <div class="h-10 w-10 grid place-items-center absolute bg-slate-300 text-white rounded-l-md">
                    <x-svg-search width="24px" height="24px"/>
                </div>
                <input 
                    type="text" 
                    class="pl-12 text-slate-500 pr-3 h-10 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"  
                    placeholder="Search Here..."
                    wire:model='search' 
                />
            </div>
        </div>
    </div>
    @if (session()->has('success'))
        <div class="flex w-screen justify-center items-center">
            <div class="w-11/12 h-12 md:w-4/5 mb-3 flex items-center justify-start">
                <div class="w-full md:w-1/2 lg:w-1/3 h-full bg-green-500 text-white md:px-10 px-5 flex items-center justify-start rounded-md  relative">
                    <x-svg-check width="18px" height="18px" /> &nbsp; &nbsp;
                    <h3 class="text-sm capitalize">{{ session('success') }}</h3>
                </div>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="flex w-screen justify-center items-center">
            <div class="w-11/12 h-12 md:w-4/5 mb-3 flex items-center justify-start">
                <div class="w-full md:w-1/2 lg:w-1/3 h-full bg-red-500 text-white md:px-10 px-5 flex items-center justify-start rounded-md">
                    <x-svg-warning  width="18px" height="18px"/>
                    &nbsp; &nbsp;
                    <h3 class="text-sm capitalize">{{ session('error') }}</h3>
                </div>
            </div>
        </div>
    @endif
        <div class="w-screen flex flex-col items-center justify-center mb-40">
            <table class="w-11/12 md:w-4/5 hidden md:table rounded-md overflow-hidden">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Position
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Edit
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Delete
                    </th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($positiones) > 0)
                        @foreach ($positiones as $position)    
                            <tr class="odd:bg-white even:bg-slate-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $loop->iteration }}
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $position->positions }}
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    <button 
                                        class="bg-green-500 hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300 active:bg-green-700 px-3 py-1 text-sm leading-5 rounded-sm font-semibold text-white"
                                        wire:click='edit({{ $position->id }})'
                                    >
                                        Edit
                                    </button>
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    <button 
                                        class="bg-red-500 hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 active:bg-red-700 px-3 py-1 text-sm leading-5 rounded-sm font-semibold text-white"
                                        wire:click.prevent='delete({{ $position->id }})'
                                    >
                                        Delete
                                    </button>
                                </td> 
                            </tr>
                        @endforeach
                    @else
                        <div class="relative flex w-screen justify-center items-center">
                            <div class="md:w-4/5 w-11/12 absolute top-20 h-12 mb-3 flex items-center justify-center ">
                                <div class="md:w-1/3 w-full h-full bg-red-500 text-white px-10 flex items-center justify-start rounded-md">
                                    <x-svg-warning  width="18px" height="18px"/>
                                    &nbsp; &nbsp;
                                    <h3 class="text-sm capitalize">Record Not Found!</h3>
                                </div>
                            </div>
                        </div>
                    @endif
                </tbody>
            </table>
            @if (count($positiones) > 0)
                @foreach ($positiones as $position)
                <div class="w-11/12 py-3 px-5 bg-slate-700/50 backdrop-blur-md md:hidden rounded-md mt-2 flex space-x-3 items-center">
                    <h3 class="w-1/3 text-white">{{ $position->positions }}</h3>
                    <div class="w-2/3 flex justify-end space-x-3">
                        <button 
                            class="bg-green-500 hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300 active:bg-green-700 px-3 py-1 text-sm leading-5 rounded-sm font-semibold text-white"
                            wire:click='edit({{ $position->id }})'
                        >
                            Edit
                        </button>
                        <button 
                            class="bg-red-500 hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 active:bg-red-700 px-3 py-1 text-sm leading-5 rounded-sm font-semibold text-white"
                            wire:click.prevent='delete({{ $position->id }})'
                        >
                            Delete
                        </button>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    @endif
    @if ($showCreate == true)    
        <div class="w-screen flex flex-col items-center mb-5">
            <form wire:submit.prevent='store' class="w-11/12 md:w-4/5 flex flex-col justify-center">
                <label class="block w-full">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">New Position</span>
                    <input 
                        type="text" 
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1"  
                        placeholder="Positions"
                        wire:model.lazy='positions'  
                        autofocus
                    />
                    @error('positions')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <div class="flex mt-5 space-x-3">
                    <button class="bg-slate-500 hover:bg-slate-600 focus:outline-none focus:ring focus:ring-slate-300 active:bg-slate-700 w-10 h-10 mb-5 text-sm leading-5 rounded-md font-semibold text-white flex items-center justify-center" wire:click='goBack'>
                        <x-svg-back width="18px" height="18px"/>
                    </button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 active:bg-blue-700 md:w-1/3 lg:w-1/6 w-1/2 h-10 text-sm leading-5 rounded-md font-semibold text-white flex items-center justify-center">
                        <x-svg-save width="18px" height="18px"/> &nbsp; Save
                    </button>
                </div>
            </form>
        </div>
    @endif
    @if ($showUpdate == true)    
    <div class="w-screen flex flex-col items-center mb-5">
        <form wire:submit.prevent='update({{ $position_id }})' class="w-11/12 md:w-4/5 flex flex-col justify-center">
            
            <label class="block w-full">
                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Update Position</span>
                <input 
                    type="text" 
                    class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1"  
                    placeholder="Positions"
                    wire:model.lazy="edit_position"  
                    autofocus
                />
                @error('edit_position')
                    <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                @enderror
            </label>
            <div class="flex mt-5 space-x-3">
                <button type="button" class="bg-slate-500 hover:bg-slate-600 focus:outline-none focus:ring focus:ring-slate-300 active:bg-slate-700 w-10 h-10 mb-5 text-sm leading-5 rounded-md font-semibold text-white flex items-center justify-center" wire:click='goBack'>
                    <x-svg-back width="18px" height="18px"/>
                </button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 active:bg-blue-700 md:w-1/3 lg:w-1/6 w-1/2 h-10 text-sm leading-5 rounded-md font-semibold text-white flex items-center justify-center">
                    <x-svg-save width="18px" height="18px"/> &nbsp; Save
                </button>
            </div>
        </form>
    </div>
    @endif
</div>
