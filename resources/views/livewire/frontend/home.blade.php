<div>
    <x-slot name='title'>
        Home
    </x-slot>
    <x-slot name='image_title'>
        Election 2022
    </x-slot>
    <div class="w-screen xl:py-32 lg:py-24 lg:px-32 py-20 px-8 xl:px-40 bg-[url('../img/hero.png')] bg-slate-400 h-screen">
      <div class="text-sm px-3 py-2 lg:px-10 rounded-md mt-10 mb-2 lg:mb-5 bg-red-500 text-white">
          Sisa Vote: <span wire:poll>{{ Auth::user()->vote_limit }}</span>
      </div>    
      <div class="text-sm px-3 py-2 lg:px-10 rounded-md mb-5 lg:mb-5 bg-red-500 text-white flex">
          <x-svg-warning/> &nbsp; &nbsp; Peringatan: Tombol hanya sekali tekan dan pilihan langsung terekam, PILIHLAH DENGAN BIJAK!!
      </div>    
      <table class="w-full md:table hidden rounded-md overflow-hidden">
        <thead class="bg-slate-700/80 w-full border-b backdrop-blur-md border-slate-200">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-100">
              Id
            </th>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-100">
              Gambar
            </th>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-100">
              Nama Kandidat
            </th>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-100">
              Sebagai
            </th>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-100">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @if (count($candidates) > 0)
            @foreach ($candidates as $candidate)
              <tr class="odd:bg-slate-600/50 capitalize backdrop-blur-sm even:bg-slate-700/60">
                <td class="px-6 py-4 whitespace-nowrap w-[50px] text-sm font-medium text-slate-100">
                  {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4 w-[100px] whitespace-nowrap text-sm text-slate-100">
                  <div class="w-[100px] h-[100px]">
                    <img src="/storage/{{ $candidate->image }}" class="object-cover border rounded-md" alt="">
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-100">
                  {{ $candidate->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-100">
                  {{ $candidate->positions->positions }}
                  @php
                      $isVoted= App\Models\Votes::where(['user_id' => Auth::user()->id, 'con_id' => $candidate->id])->first();
                  @endphp
                </td>
                @isset($isVoted)
                  @if ($isVoted->user_id != '' || $isVoted->con_id != '')
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                      <button 
                        class="bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 active:bg-sky-700 px-3 py-1 text-sm leading-5 rounded-sm font-semibold text-white cursor-default disabled:bg-slate-400"
                        disabled
                      >
                        Submited
                      </button>
                    </td>
                  @endif
                @endisset
                @empty($isVoted)
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                    <button 
                      class="bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 active:bg-sky-700 px-3 py-1 text-sm leading-5 rounded-sm font-semibold text-white"
                      wire:click='addVote({{ $candidate->id }})'
                    >
                      Submit
                    </button>
                  </td>
                @endempty
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>

      {{-- mobile --}}
      @if (count($candidates) > 0)
        @foreach ($candidates as $candidate)
          <div class="w-full py-3 px-5 bg-slate-700/50 backdrop-blur-md md:hidden rounded-md mt-2 flex space-x-3 items-center">
            <div class="w-[100px] h-[100px] grid place-items-center">
              <img src="/storage/{{ $candidate->image }}" class="object-cover border rounded-md" alt="">
            </div>
            <div class="h-[100px] w-[1px] bg-white"></div>
            <div class="w-full space-y-3">
              <h3 class="text-white capitalize">
                {{ $candidate->name }}
              </h3>
              @isset($isVoted)
                @if ($isVoted->user_id != '' || $isVoted->con_id != '')
                  <button 
                    class="bg-green-500 hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300 active:bg-green-700 py-3 text-sm leading-5 w-full rounded-md font-semibold text-white cursor-default disabled:bg-slate-400 disabled:border"
                    disabled
                  >
                    Submited
                  </button>
                @endif
              @endisset
              @empty($isVoted)
                <button 
                  class="bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 active:bg-sky-700 py-3 text-sm leading-5 w-full rounded-md font-semibold text-white cursor-default disabled:bg-slate-400 disabled:border"
                >
                  Submit
                </button>
              @endempty
            </div>
          </div>
        @endforeach
      @endif
    </div>
</div>
