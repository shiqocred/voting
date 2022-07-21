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
    public $date_now;
    public $name_election;
    public $time_to_start;
    public $time_to_end;
    public $setting;

    public function render()
    {
        $this->date_now = date(now('+07:00')->format('Y-m-d H:i'));
        $date_now = date(now('+07:00')->format('Y-m-d H:i'));
        $settings = Setting::findOrFail(1);
        $this->name_election = $settings->home_name;
        $this->date_polling = $settings->election_date;
        $time_start = $settings->election_date . " " . $settings->election_time_start;
        $time_end = $settings->election_date . " " . $settings->election_time_end;
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

        $myDate = date(now('+07:00')->format('Y-m-d'));
        $myTime = date(now('+07:00')->format('H:i:s'));
        $time = Setting::findOrFail(1);
        $nowDate = $time->election_date;
        $nowTimeStart = $time->election_time_start;
        $nowTimeEnd = $time->election_time_end;
        // dd($myTime, $nowTimeStart);
        // if ($nowTimeStart >= $myTime) {
        //     dd(true);
        // } else {
        //     dd(false);
        // }
        if ($nowDate == $myDate) {
            if ($nowTimeStart <= $myTime) { //20.00 & 20.51
                if ($nowTimeEnd >= $myTime) { //22.00 & 22.34
                    if ($user) {
                        if (Auth::user()->vote_limit === 0) {
                            return redirect('/logout');
                        } else {
                            return redirect(route('front.home'));
                        }
                        session()->regenerate();
                        session()->flash('success', 'login successfully');
                        return redirect(route('front.home'));
                    } else {
                        session()->flash('error', 'Invalid vote id and password');
                    }
                } else {
                    $this->keluar();
                }
            } else {
                $this->keluar();
            }
        } else {
            $this->keluar();
        }
        
        
    }
}
