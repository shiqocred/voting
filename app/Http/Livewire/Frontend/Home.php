<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Condidate;
use App\Models\User;
use App\Models\Votes;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $showDetails = false;
    public $siapPilih = false;
    public $detail_name;
    public $detail_visi;
    public $detail_misi;
    public $detail_color;
    public $detail_pos_id;
    public $detail_image;
    public $candidates;
    public function render()
    {
        $this->candidates = Condidate::orderBy('id', 'DESC')->get();
        return view('livewire.frontend.home')->layout('layout.app');
    }

    public function addVote($id)
    {
        $votes=new Votes();
        $addVote=Condidate::findOrFail($id);

        $addVote->points=$addVote->points + 1;
        $addVote->save();

        $votes->user_id = Auth::user()->id;
        $votes->con_id = $id;

        $votes->save();

        $users = User::findOrFail(Auth::user()->id);
        $users->vote_limit=$users->vote_limit - 1;
        $users->voted=$users->voted + 1;
        $users->save();
        if ($users->vote_limit === 0) {
            return redirect('/logout');
            Auth::logout();
            return redirect(route('front.login'));
        }
    }
    public function visi($id)
    {
        $this->showDetails = true;
        $condidate = Condidate::findOrFail($id);
        $this->detail_name= $condidate->name;
        $this->detail_visi= $condidate->visi;
        $this->detail_misi= $condidate->misi;
        $this->detail_color= $condidate->color;
        $this->detail_pos_id= $condidate->positions->positions;
        $this->detail_image= $condidate->image;
    }

    public function cVisi()
    {
        $this->showDetails = false;
    }
    public function sPilih()
    {
        $this->siapPilih = true;
    }
}
