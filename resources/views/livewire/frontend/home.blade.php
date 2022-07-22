<div>
    <x-slot name='title'>
        Home
    </x-slot>
    <x-slot name='image_title'>
        Election 2022
    </x-slot>
    <div class="w-screen xl:py-32 lg:py-24 lg:px-32 pb-20 pt-[50px] px-8 xl:px-40 bg-[url('../img/hero.png')] bg-slate-400 min-h-screen relative">
      @if ($showDetails == true)
      <div class="w-screen h-screen fixed z-30 top-0 left-0 flex justify-center items-center bg-slate-700/30 backdrop-blur-md">
          <div class="w-11/12 lg:w-4/5 mb-5 rounded-md flex flex-col overflow-hidden">
              <div class="w-full h-14 bg-slate-300 flex justify-start items-center px-10 text-slate-700">
                  <span class="uppercase font-semibold text-xl">Detail</span>
              </div>
              <div class="w-full px-5 py-5 sm:py-10 bg-slate-100 flex sm:flex-row flex-col justify-center items-center">
                  <div class="w-[150px] sm:w-[250px] h-[150px] sm:h-[250px] p-2 sm:p-3 rounded-md overflow-hidden bg-slate-200 flex justify-end items-center">
                      <img src="/storage/{{ $detail_image }}" class="object-cover border" alt="">
                  </div>
                  <div class="w-full sm:w-[1px] h-[1px] sm:h-[300px] my-5 sm:mx-10 flex bg-slate-400"></div>
                  <div class="w-full sm:w-3/6 flex">
                      <div class="w-full flex flex-col items-start space-y-3 text-slate-700">
                          <div class="w-full">
                              <h3>Nama Kandidat:</h3>
                              <span class="w-full rounded-md block py-2 px-5 bg-slate-300 ">{{ $detail_name }}</span>
                          </div>
                          <div class="w-full flex">
                              <div class="w-1/2 mr-2">
                                  <h3>Kekeluargaan:</h3>
                                  <span class="w-full rounded-md block py-2 px-5 bg-slate-300 ">{{ $detail_keluarga }}</span>
                              </div>
                              <div class="w-1/2 ml-2">
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
      <div class="text-sm px-3 py-2 lg:px-10 rounded-md mt-10 mb-2 lg:mb-5 bg-red-400/60 backdrop-blur-md text-white">
          Sisa Vote: <span wire:poll>{{ Auth::user()->vote_limit }}</span>
      </div>    
      <div class="text-sm px-3 py-2 lg:px-10 rounded-md mb-2 lg:mb-5 bg-red-400/60 backdrop-blur-md text-white flex">
          <x-svg-warning/> &nbsp; &nbsp; Peringatan: Tombol hanya sekali tekan dan pilihan langsung terekam, PILIHLAH DENGAN BIJAK!! <br/> <br/>
          Nb: demi menghidari salah tekan, kami menonaktifkan tombol pilih. Jika anda siap memilih silahkan tekan tombol dibawah ini!
      </div>    
      <div class="text-sm rounded-md overflow-hidden mb-5 lg:mb-5 backdrop-blur-md text-white flex">
        @if ($siapPilih == false)    
          <button 
            class="bg-green-500 hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300 active:bg-green-700 w-full h-full px-5 py-3 text-sm leading-5 rounded-sm font-semibold text-white"
            wire:click='sPilih'>
            Siap Pilih
          </button>
          @else
          <h3 class="w-full py-3 grid place-items-center bg-slate-700/50">Selamat Memilih</h3>
        @endif
      </div>    
      <table class="w-full md:table hidden rounded-md overflow-hidden">
        <thead class="bg-slate-300/80 w-full border-b backdrop-blur-md border-slate-400">
          <tr>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-700">
              Id
            </th>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-700">
              Gambar
            </th>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-700">
              Nama Kandidat
            </th>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-700">
              Kewarganegaraan
            </th>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-700">
              Visi & Misi
            </th>
            <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-700">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @if (count($candidates) > 0)
            @foreach ($candidates as $candidate)
              <tr class="odd:bg-slate-100/30 capitalize backdrop-blur-md even:bg-slate-300/70">
                <td class="px-6 py-4 whitespace-nowrap w-[50px] text-sm font-medium text-slate-700">
                  {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4 w-[100px] whitespace-nowrap text-sm text-slate-700">
                  <div class="w-[100px] h-[100px]">
                    <img src="/storage/{{ $candidate->image }}" class="object-cover border rounded-md" alt="">
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                  {{ $candidate->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-700">
                  {{ $candidate->keluarga }}
                  @php
                      $isVoted= App\Models\Votes::where(['user_id' => Auth::user()->id, 'con_id' => $candidate->id])->first();
                  @endphp
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-700">
                  <button 
                    class="bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 active:bg-sky-700 px-5 py-2 text-sm leading-5 rounded-sm font-semibold text-white"
                    wire:click='visi({{ $candidate->id }})'>
                    Detail
                  </button>
                </td>
                @isset($isVoted)
                  @if ($isVoted->user_id != '' || $isVoted->con_id != '')
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                      <button 
                        class="bg-green-500 hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300 active:bg-green-700 px-5 py-2 text-sm leading-5 rounded-sm font-semibold text-white cursor-default disabled:bg-slate-400"
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
                      class="bg-green-500 hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300 active:bg-green-700 px-5 py-2 text-sm leading-5 rounded-sm font-semibold text-white"
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

      @if (count($candidates) > 0)
        @foreach ($candidates as $candidate)
          <div class="w-full py-3 px-5 bg-slate-700/50 backdrop-blur-md md:hidden rounded-md mt-2 flex space-x-3 items-center">
            <div class="w-[100px] h-[100px] grid place-items-center">
              <img src="/storage/{{ $candidate->image }}" class="object-cover border rounded-md" alt="">
            </div>
            <div class="h-[200px] w-[1px] bg-white"></div>
            <div class="w-full space-y-3">
              <div>
                <span class="text-slate-800">Nama Kandidat:</span>
                <h3 class="text-slate-200 capitalize">
                  {{ $candidate->name }}
                </h3>
              </div>
              <div>
                <span class="text-slate-800">Kekeluargaan:</span>
                <h3 class="text-slate-200 capitalize">
                  {{ $candidate->keluarga }}
                </h3>
              </div>
              <button 
                class="bg-sky-500 hover:bg-sky-600 focus:outline-none focus:ring focus:ring-sky-300 active:bg-sky-700 py-3 text-sm leading-5 w-full rounded-md font-semibold text-white cursor-default disabled:bg-slate-400 disabled:border"
                wire:click='visi({{ $candidate->id }})'
              >
                Detail
              </button>
              @php
                  $isVoted= App\Models\Votes::where(['user_id' => Auth::user()->id, 'con_id' => $candidate->id])->first();
              @endphp
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
                @if ($siapPilih == false)
                  <button 
                    id="tombol"
                    class="bg-green-500 hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300 active:bg-green-700 py-3 text-sm leading-5 w-full rounded-md font-semibold text-white disabled:bg-slate-400 disabled:border cursor-default "
                    wire:click='addVote({{ $candidate->id }})'
                    disabled
                  >
                    Submit
                  </button>
                @else
                  <button 
                    id="tombol"
                    class="bg-green-500 hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300 active:bg-green-700 py-3 text-sm leading-5 w-full rounded-md font-semibold text-white disabled:bg-slate-400 disabled:border cursor-default "
                    wire:click='addVote({{ $candidate->id }})'
                  >
                    Submit
                  </button>
                @endif
              @endempty
            </div>
          </div>
        @endforeach
      @endif
    </div>
</div>
