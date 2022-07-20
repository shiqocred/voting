<div class="bg-[url('../img/hero-60.png')] min-h-screen bg-slate-400">
    <x-slot name='title'>
        Voter
    </x-slot>
    <div class="flex w-screen justify-center pt-[130px] lg:pt-12 items-center">
        <div class="w-11/12 h-16 rounded-md flex px-5 md:px-10 md:w-4/5 lg:my-10 mb-5 items-center justify-between bg-slate-300">
            <h3 class="text-xl font-semibold uppercase">{{ __('Voters ') }} : {{ $total }}</h3>
            <form wire:submit.prevent='create'>
                <button class="bg-violet-500 hover:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300 active:bg-violet-700 text-sm h-10 w-20 rounded-md font-semibold text-white">New</button>
            </form>
        </div>
    </div>
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
                <div class="w-full md:w-1/2 lg:w-1/3 h-full bg-red-500 text-white md:px-10 px-5 flex items-center justify-start rounded-md  relative">
                    <x-svg-warning  width="18px" height="18px"/>
                    &nbsp; &nbsp;
                    <h3 class="text-sm capitalize">{{ session('error') }}</h3>
                </div>
            </div>
        </div>
    @endif
        <div class="w-screen flex flex-col sm:flex-row sm:flex-wrap sm:justify-between md:justify-center md:px-0 sm:px-8 lg:flex-col items-center justify-center pb-40">
            <table class="w-11/12 md:w-4/5 hidden md:table rounded-md overflow-hidden">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 min-w-[100px] text-left text-sm font-medium text-slate-900">
                        Vote Id
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Password
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Votes
                    </th>
                    <th scope="col" class="px-6 py-3 min-w-[100px] text-left text-sm font-medium text-slate-900">
                        Voted 1
                    </th>
                    <th scope="col" class="px-6 py-3 min-w-[100px] text-left text-sm font-medium text-slate-900">
                        Voted 2
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Action
                    </th>
                    </tr>
                </thead>
                <tbody class="relative" wire:poll.30000ms>
                    @if (count($voters) > 0)
                        @foreach ($voters as $voter)    
                            <tr class="odd:bg-white even:bg-slate-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $loop->iteration }}
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap min-w-[100px] text-sm font-medium text-slate-900">
                                    {{ $voter->vote_id }}
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $voter->passwordNormal }}
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $voter->vote_limit }}
                                </td>  
                                    @if (count($voter->votes)>1)
                                        @foreach ($voter->votes as $item)
                                            <td class="px-6 py-4 whitespace-nowrap min-w-[100px] text-sm font-medium text-slate-900">
                                                {{ $item->created_at->diffForHumans() }}
                                            </td>
                                        @endforeach
                                    @elseif (count($voter->votes)>0)
                                        @foreach ($voter->votes as $item)
                                            <td class="px-6 py-4 whitespace-nowrap min-w-[100px] text-sm font-medium text-slate-900">
                                                {{ $item->created_at->diffForHumans() }}
                                            </td>
                                        @endforeach
                                        <td class="px-6 py-4 whitespace-nowrap min-w-[100px] text-sm font-medium text-slate-900">
                                            Null
                                        </td>
                                    @else
                                        <td class="px-6 py-4 whitespace-nowrap min-w-[100px] text-sm font-medium text-slate-900">
                                            Null
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap min-w-[100px] text-sm font-medium text-slate-900">
                                            Null
                                        </td>
                                    @endif
                                <td class="px-2 w-[200px] py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    <button 
                                        class="bg-red-500 hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 active:bg-red-700 px-3 py-1 text-sm leading-5 rounded-sm font-semibold text-white"
                                        wire:click.prevent='delete({{ $voter->id }})'
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
            @if (count($voters) > 0)
                @foreach ($voters as $voter)
                    <div class="w-11/12 sm:w-[48%] py-7 bg-slate-700/50 backdrop-blur-md md:hidden rounded-md mt-4 flex space-y-5 flex-col items-center justify-center" wire:poll.30000ms>
                        <div class="flex justify-around px-2 w-full">
                            <div class="flex flex-col w-5/12">
                                <span class="text-slate-100">Vote Id:</span>
                                <h3 class="w-full py-1 rounded-sm bg-slate-100 px-3">{{ $voter->vote_id }}</h3>
                            </div>
                            <div class="flex flex-col w-5/12">
                                <span class="text-slate-100">Password:</span>
                                <h3 class="w-full py-1 rounded-sm bg-slate-100 px-3">{{ $voter->passwordNormal }}</h3>
                            </div>
                        </div>
                        <div class="flex justify-around px-2 h-8 w-full relative">
                            @if (count($voter->votes)>1)
                                @foreach ($voter->votes as $item)
                                    <div class="flex flex-col items-start justify-center w-5/12 whitespace-nowrap text-sm font-medium text-slate-100">
                                        <span class="text-slate-100">Vote {{ $loop->iteration }}</span>
                                        <h3 class="py-2 w-full flex justify-center bg-slate-100/30">{{ $item->created_at->diffForHumans() }}</h3>
                                    </div>
                                @endforeach
                            @elseif (count($voter->votes)>0)
                                @foreach ($voter->votes as $item)
                                    <div class="flex flex-col items-start justify-center w-5/12 whitespace-nowrap text-sm font-medium text-slate-100">
                                        <span class="text-slate-100">Vote 1</span>
                                        <h3 class="py-2 w-full flex justify-center bg-slate-100/30">{{ $item->created_at->diffForHumans() }}</h3>
                                    </div>
                                @endforeach
                                <div class="flex flex-col items-start justify-center w-5/12 whitespace-nowrap text-sm font-medium text-slate-100">
                                    <span class="text-slate-100">Vote 2</span>
                                    <h3 class="py-2 w-full flex justify-center bg-slate-100/30">Null</h3>
                                </div>
                            @else
                                <div class="flex flex-col items-start justify-center w-5/12 whitespace-nowrap text-sm font-medium text-slate-100">
                                    <span class="text-slate-100">Vote 1</span>
                                    <h3 class="py-2 w-full flex justify-center bg-slate-100/30">Null</h3>
                                </div>
                                <div class="flex flex-col items-start justify-center w-5/12 whitespace-nowrap text-sm font-medium text-slate-100">
                                    <span class="text-slate-100">Vote 2</span>
                                    <h3 class="py-2 w-full flex justify-center bg-slate-100/30">Null</h3>
                                </div>
                            @endif
                        </div>
                        <div class="w-full px-6 pt-5">
                            <button 
                                class="bg-red-500 hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 active:bg-red-700 w-full py-3 text-sm leading-5 rounded-sm font-semibold text-white"
                                wire:click.prevent='delete({{ $voter->id }})'
                            >
                                Delete
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
</div>
