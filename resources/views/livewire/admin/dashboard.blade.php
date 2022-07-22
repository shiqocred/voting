<div class="bg-slate-400 min-h-screen flex flex-col items-center justify-center bg-[url('../img/hero-60.png')]">
    <x-slot name='title'>
        Dashboard
    </x-slot>
    <div class="w-screen flex flex-col xl:flex-wrap xl:flex-row items-center justify-center pt-[130px] pb-10">
      <div class="w-full md:w-3/12 md:m-3 my-1.5 sm:my-2 flex justify-center">
        <div class="w-11/12 bg-slate-100 flex justify-between px-10 py-2  sm:py-3 rounded-md">
          <h4 class="text-md sm:text-xl font-semibold sm:font-bold">Total Pemilih</h4>
        <span>{{ $totalVoter }}</span>
        </div>
      </div>
      <div class="w-full md:w-3/12 md:m-3 my-1.5 sm:my-2 flex justify-center">
        <div class="w-11/12 bg-slate-100 flex justify-between px-10 py-2  sm:py-3 rounded-md">
          <h4 class="text-md sm:text-xl font-semibold sm:font-bold">Total Pemilih</h4>
        <span>{{ $totalVoter }}</span>
        </div>
      </div>
      <div class="w-full md:w-3/12 md:m-3 my-1.5 sm:my-2 flex justify-center">
        <div class="w-11/12 bg-slate-100 flex justify-between px-10 py-2  sm:py-3 rounded-md">
          <h4 class="text-md sm:text-xl font-semibold sm:font-bold">Total Suara</h4>
        <span>{{ $totalVotes }}</span>
        </div>
      </div>
    </div>
    <div class="w-11/12 h-[1px] bg-white"></div>
    <div class="w-11/12 pb-32 pt-10 xl:px-40 space-y-10 space-x-0 xl:space-y-0 xl:space-x-10 flex flex-col xl:flex-row relative">
        <div class="w-full flex flex-col items-center justify-start">
            <div class="w-full h-12 mb-2 bg-slate-500 text-white px-10 flex items-center justify-start rounded-md  relative">
                <x-svg-check width="18px" height="18px" /> &nbsp; &nbsp;
                <h3 class="text-sm capitalize">Is Voted</h3>
            </div>
            <table class="w-full">
                <thead class="bg-slate-100 border-b border-slate-200">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                      #
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                      Vote Id
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                      IsVoted
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($isVotedUser) > 0)
                    @foreach ($isVotedUser as $user)
                      <tr class="odd:bg-white even:bg-slate-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                          {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                            {{ $user->vote_id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                          {{ $user->voted == 2 ? 'Voted' : 'Voted (1)' }}
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
            </table>
        </div>
        <div class="w-full flex flex-col items-center justify-start">
            <div class="w-full h-12 mb-2 bg-slate-600 text-white px-10 flex items-center justify-start rounded-md  relative">
                <x-svg-check width="18px" height="18px" /> &nbsp; &nbsp;
                <h3 class="text-sm capitalize">Is Not Voted</h3>
            </div>
            <table class="w-full">
                <thead class="bg-slate-100 border-b border-slate-200">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                      #
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                      Vote ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-slate-900">
                      IsVoted
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($notVotedUser) > 0)
                    @foreach ($notVotedUser as $user)
                      <tr class="odd:bg-white even:bg-slate-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                          {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                            {{ $user->vote_id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                          {{ $user->voted == 0 ? 'Not Voted' : '' }}
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
