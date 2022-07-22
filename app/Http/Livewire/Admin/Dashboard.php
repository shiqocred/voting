<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condidate;
use App\Models\User;
use App\Models\Votes;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalCandidates;
    public $totalVoter;
    public $totalVotes;

    public $isVotedUser;
    public $notVotedUser;
    public function render()
    {
        $this->totalCandidates = Condidate::count();
        $this->totalVoter = User::count();
        $this->totalVotes = Votes::count();
        $this->isVotedUser = User::where('voted', 2)->orWhere('voted', 1)->orderBy('Id', 'DESC')->get();
        $this->notVotedUser = User::where('voted', 0)->orderBy('Id', 'DESC')->get();
        return view('livewire.admin.dashboard')->layout('layout.admin-app');
    }

}
