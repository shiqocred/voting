<div class="bg-[url('../img/hero-60.png')] min-h-screen bg-slate-400 relative">
    <x-slot name='title'>
        Condidates
    </x-slot>
    @if ($showDetails == true)
    <div class="w-screen h-screen fixed z-30 flex justify-center items-center bg-slate-700/30 backdrop-blur-md">
        <div class="w-11/12 lg:w-4/5 mb-5 rounded-md flex flex-col overflow-hidden">
            <div class="w-full h-14 bg-slate-300 flex justify-start items-center px-10 text-slate-700">
                <span class="uppercase font-semibold text-xl">Detail</span>
            </div>
            <div class="w-full px-5 py-5 sm:py-10 bg-slate-100 flex sm:flex-row flex-col justify-center items-center">
                <div class="w-[150px] sm:w-[250px] h-[150px] sm:h-[250px] p-2 sm:p-3 rounded-md overflow-hidden bg-slate-200 flex justify-end items-center">
                    <img src="/storage/{{ $detail_image }}" class="object-cover border rounded-md" alt="">
                </div>
                <div class="w-full sm:w-[1px] h-[1px] sm:h-[300px] my-5 sm:mx-10 flex bg-slate-400"></div>
                <div class="w-full sm:w-3/6 flex">
                    <div class="w-full flex flex-col items-start space-y-3 text-slate-700">
                        <div class="w-full">
                            <h3>Nama Kandidat:</h3>
                            <span class="w-full rounded-md block py-2 px-5 bg-slate-300 ">{{ $detail_name }}</span>
                        </div>
                        <div class="w-full flex">
                            <div class="min-w-[50%] mr-2">
                                <h3>Kewarganegaraan:</h3>
                                <span class="w-full rounded-md block py-2 px-5 bg-slate-300 ">{{ $detail_pos_id }}</span>
                            </div>
                            <div class="max-w-[50%] min-w-[25%] ml-2">
                                <h3>Warna:</h3>
                                <input type="color" value="{{ $detail_color }}" class="w-full rounded-md block py-2 h-10 px-5 bg-slate-300 " disabled>
                            </div>
                        </div>
                        <div class="w-full">
                            <h3>Visi:</h3>
                            @if ($detail_visi !== null)
                                <span class="w-full rounded-md block py-2 px-5 bg-slate-300 ">
                                    {{ $detail_visi }}
                                </span>
                            @else
                                <span class="w-full italic rounded-md block py-2 px-5 bg-slate-300 ">
                                    null
                                </span>
                            @endif
                        </div>
                        <div class="w-full">
                            <h3>Misi:</h3>
                            @if ($detail_misi !== null)
                                <span class="w-full rounded-md block py-2 px-5 bg-slate-300 ">
                                    {{ $detail_misi }}
                                </span>
                            @else
                                <span class="w-full italic rounded-md block py-2 px-5 bg-slate-300 ">
                                    null
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full h-14 bg-slate-300 flex justify-end items-center px-10 text-slate-700">
                <button wire:click='cVisi' title="tutup" class="px-5 py-1 rounded-md border flex items-center justify-center border-slate-700">Close</button>
            </div>
        </div>
    </div>
    @endif
    <div class="flex w-screen justify-center pt-[130px] lg:pt-12 items-center">
        <div class="w-11/12 h-16 rounded-md flex px-5 md:px-10 md:w-4/5 lg:my-10 mb-5 items-center justify-between bg-slate-300">
            <h3 class="text-xl font-semibold uppercase">{{ __('Kandidat ') }} : {{ $total }}</h3>
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
                <div class="w-full md:w-1/2 lg:w-1/3 h-full bg-red-500 text-white md:px-10 px-5 flex items-center justify-start rounded-md  relative">
                    <x-svg-warning  width="18px" height="18px"/>
                    &nbsp; &nbsp;
                    <h3 class="text-sm capitalize">{{ session('error') }}</h3>
                </div>
            </div>
        </div>
    @endif
        <div class="w-screen flex flex-col sm:flex-row sm:flex-wrap sm:justify-between lg:justify-center lg:px-0 sm:px-8 md:px-20 lg:flex-col items-center justify-center pb-40">
            
            <table class="w-11/12 lg:w-4/5 hidden lg:table rounded-md overflow-hidden">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Kewarganegaraan
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Ditambahkan
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Diperbarui
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Warna
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Visi & Misi
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                        Action
                    </th>
                    </tr>
                </thead>
                <tbody class="relative">
                    @if (count($condidates) > 0)
                        @foreach ($condidates as $condidate)    
                            <tr class="odd:bg-white even:bg-slate-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $loop->iteration }}
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    <div class="w-[100px] h-[100px] overflow-hidden rounded-md">
                                        <img src="/storage/{{ $condidate->image }}" class="object-cover border rounded-md" alt="">
                                    </div>
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $condidate->name }}
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $condidate->positions->positions }}
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $condidate->created_at->diffForHumans() }}
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $condidate->updated_at->diffForHumans() }}
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    <div class="w-9 h-8 flex justify-center items-center overflow-hidden rounded-md">
                                        <input type="color" class="w-10 h-10" value="{{ $condidate->color }}" disabled />
                                    </div>
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    <button 
                                    class="bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 active:bg-sky-700 px-3 py-1 text-sm leading-5 rounded-sm font-semibold text-white"
                                    wire:click='visi({{ $condidate->id }})'>Detail</button>
                                </td> 
                                <td class="px-2 py-4 whitespace-nowrap  text-sm font-medium text-slate-900">
                                    <div class="flex space-x-2">
                                        <button 
                                            class="bg-green-500 hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300 active:bg-green-700 px-3 py-1 text-sm leading-5 rounded-sm font-semibold text-white"
                                            wire:click='edit({{ $condidate->id }})'
                                        >
                                            Edit
                                        </button>
                                        <button 
                                            class="bg-red-500 hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 active:bg-red-700 px-3 py-1 text-sm leading-5 rounded-sm font-semibold text-white"
                                            wire:click.prevent='delete({{ $condidate->id }})'
                                        >
                                            Delete
                                        </button>
                                    </div>
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
            @if (count($condidates) > 0)
                @foreach ($condidates as $condidate)
                    <div class="w-11/12 sm:w-[48%] py-7 bg-slate-700/50 backdrop-blur-md lg:hidden rounded-md mt-4 flex space-y-5 flex-col items-center justify-center">
                        <div class="w-[100px] h-[100px] grid place-items-center">
                            <img src="/storage/{{ $condidate->image }}" class="object-cover border rounded-md" alt="">
                        </div>
                        <div class="w-[90%] h-[1px] bg-white"></div>
                        <div class="w-4/5 flex flex-col justify-center space-y-5">
                            <div  class="text-white min-w-full flex flex-col text-start items-start justify-center space-y-3">
                                <div class="flex w-full flex-col ">
                                    <span class="font-semibold">Nama Kandidat:</span>
                                    <h3 class="w-full py-1 px-3 rounded-sm capitalize bg-slate-100 text-slate-700">{{ $condidate->name }}</h3>
                                </div>
                                <div class="flex w-full flex-col ">
                                    <span class="font-semibold">Kewarganegaraan: </span>
                                    <span class="w-full py-1 px-3 rounded-sm capitalize bg-slate-100 text-slate-700">
                                        {{ $condidate->positions->positions }}
                                    </span>
                                </div>
                                <div class="flex w-full flex-col">
                                    <span class="font-semibold">Warna: </span>
                                    <div class="flex w-full">
                                        <input type="color" class="border-0 bg-slate-300 py-1 h-10 rounded-sm px-3 ring-0 w-1/2 mr-5" value="{{ $condidate->color }}" disabled />
                                        <button 
                                        class="bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 active:bg-sky-700 w-1/2 px-3 py-2 text-sm leading-5 rounded-sm font-semibold text-white"
                                        wire:click='visi({{ $condidate->id }})'>Detail</button>
                                        </div>
                                </div>
                            </div>
                            <button 
                                class="bg-green-500 hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300 active:bg-green-700 w-full py-2 text-sm leading-5 rounded-sm font-semibold text-white"
                                wire:click='edit({{ $condidate->id }})'
                            >
                                Edit
                            </button>
                            <button 
                                class="bg-red-500 hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 active:bg-red-700 w-full py-2 text-sm leading-5 rounded-sm font-semibold text-white"
                                wire:click.prevent='delete({{ $condidate->id }})'
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
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Name</span>
                    <input 
                        type="text" 
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Name"
                        wire:model.lazy='name'  
                        autofocus
                    />
                    @error('name')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Visi</span>
                    <textarea 
                        type="text" 
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Visi"
                        wire:model.lazy='visi'  
                    ></textarea>
                    @error('visi')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Misi</span>
                    <textarea 
                        type="text" 
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Misi"
                        wire:model.lazy='misi'  
                    ></textarea>
                    @error('misi')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Kewarganegaraan</span>
                    <select wire:model.lazy='pos_id' class="mt-1 px-3 appearance-none py-2 w-full md:w-3/5 lg:w-2/5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-md transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-sky-600 focus:outline-non" >
                    <option selected>Pilih Kewarganegaraan</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->positions }}</option>
                        @endforeach
                    </select>
                    @error('pos_id')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Warna</span>
                    <input 
                        type="color" 
                        class="mt-1 h-10 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Name"
                        wire:model.lazy='color'  
                    />
                    @error('color')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Image</span>
                    <input 
                        type="file" 
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100 file:cursor-pointer"  
                        wire:model='image'  
                    />
                    @error('image')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                    @if ($image)
                        <div class="lg:w-[300px] lg:h-[300px] sm:w-[250px] sm:h-[250px] h-[150px] w-[150px] mt-3 rounded-md border overflow-hidden">
                            <img src="{{ $image->temporaryUrl() }}" class="object-cover" alt="">
                        </div>
                    @endif
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
    @if ($showUpdate == true)    
        <div class="w-screen flex flex-col items-center mb-5">
            <form wire:submit.prevent='update({{ $condidate_id }})' class="w-11/12 md:w-4/5 flex flex-col justify-center">
                
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Name</span>
                    <input 
                        type="text" 
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Name"
                        wire:model.lazy='edit_name'  
                        autofocus
                    />
                    @error('edit_name')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Visi</span>
                    <textarea 
                        type="text" 
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Visi"
                        wire:model.lazy='edit_visi'  
                    ></textarea>
                    @error('edit_visi')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Misi</span>
                    <textarea 
                        type="text" 
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Misi"
                        wire:model.lazy='edit_misi'  
                    ></textarea>
                    @error('edit_misi')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Positions</span>
                    <select wire:model.lazy='edit_pos_id' class="mt-1 px-3 appearance-none py-2 w-full md:w-3/5 lg:w-2/5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-md transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-sky-600 focus:outline-non" >
                    <option selected>Select the position</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->positions }}</option>
                        @endforeach
                    </select>
                    @error('edit_pos_id')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Warna</span>
                    <input 
                        type="color" 
                        class="mt-1 h-10 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Name"
                        wire:model.lazy='edit_color'  
                        autofocus
                    />
                    @error('edit_color')
                        <span class="text-red-600 text-sm before:content-['*']">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block w-full mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 mb-2 block text-sm font-medium text-white">Image</span>
                    <input 
                        type="file" 
                        class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full md:w-3/5 lg:w-2/5 rounded-md sm:text-sm focus:ring-1 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100 file:cursor-pointer"  
                        wire:model='new_image'  
                    />
                    @if ($new_image)
                        <div class="lg:w-[300px] lg:h-[300px] sm:w-[250px] sm:h-[250px] h-[150px] w-[150px] mt-3 rounded-md border overflow-hidden">
                            <img src="{{ $new_image->temporaryUrl() }}" class="object-cover" alt="">
                        </div>
                        @else
                        <div class="lg:w-[300px] lg:h-[300px] sm:w-[250px] sm:h-[250px] h-[150px] w-[150px] mt-3 rounded-md border overflow-hidden">
                            <img src="/storage/{{ $old_image }}" class="object-cover" alt="">
                        </div>
                    @endif
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