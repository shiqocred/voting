<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $vote_id;
    public $password;
    public $name_election;
    
    public $date_now;
    public $time_polling_start;
    public $time_polling_end;
    
    public $time_to_start;
    public $time_to_end;
    public $setting;

    public function render()
    {
        $date_now = date(now('+07:00')->format('Y-m-d H:i'));
        $this->date_now = date(now('+07:00')->format('Y-m-d H:i'));
        $time = Setting::findOrFail(1);
        $this->name_election = $time->home_name;
        $time_start = $time->election_date_start . " " . $time->election_time_start;
        $time_end = $time->election_date_end . " " . $time->election_time_end;
        $this->time_polling_start = Carbon::createFromFormat('Y-m-d H:i:s', $time_start)->format('Y-m-d H:i');
        $this->time_polling_end = Carbon::createFromFormat('Y-m-d H:i:s', $time_end)->format('Y-m-d H:i');
        $time_polling_start = Carbon::createFromFormat('Y-m-d H:i:s', $time_start)->format('Y-m-d H:i');
        $time_polling_end = Carbon::createFromFormat('Y-m-d H:i:s', $time_end)->format('Y-m-d H:i');
        $this->time_to_start = Carbon::createFromFormat('Y-m-d H:i', $date_now)->diffForHumans($time_polling_start);
        $this->time_to_end = Carbon::createFromFormat('Y-m-d H:i', $date_now)->diffForHumans($time_polling_end);
        return view('livewire.frontend.login')->layout('layout.app');
    }

    public function keluar()
    {
        session()->invalidate();
        session()->regenerateToken();
        session()->flash('error', 'this is not time for polling');
        return redirect(route('front.login'));
    }

    public function login()
    {
        $this->validate([
            'vote_id' => ['required'],
            'password' => ['required'],
        ]);
        $user = Auth::attempt(['vote_id' => $this->vote_id, 'password' => $this->password]);

        $date_now = date(now('+07:00')->format('Y-m-d H:i'));
        $time = Setting::findOrFail(1);
        $time_start = $time->election_date_start . " " . $time->election_time_start;
        $time_end = $time->election_date_end . " " . $time->election_time_end;
        $time_polling_start = Carbon::createFromFormat('Y-m-d H:i:s', $time_start)->format('Y-m-d H:i');
        $time_polling_end = Carbon::createFromFormat('Y-m-d H:i:s', $time_end)->format('Y-m-d H:i');
        if ($time_polling_start <= $date_now) { //22 - 5 & 22 - 9
            if ($time_polling_end >= $date_now) { //22 - 20 & 22 - 9
                if ($user) {
                    if (Auth::user()->vote_limit === 0) {
                        return redirect('/logout');
                    } else {
                        session()->regenerate();
                        session()->flash('success', 'login successfully');
                        return redirect(route('front.home'));
                    }
                } else {
                    session()->flash('error', 'Invalid vote id and password');
                }
            } else {
                $this->keluar();
            }
        } else {
            $this->keluar();
        }
        
        
    }
}
