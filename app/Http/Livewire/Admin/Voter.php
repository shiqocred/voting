<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Votes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Voter extends Component
{
    public $total;
    public $search;

    public function render()
    {
        if ($this->search != "") {
            $this->total=User::where('vote_id', 'LIKE', '%' . $this->search . '%')->count();
            $voters=User::orderBy('id', 'DESC')->where('vote_id', 'LIKE', '%' . $this->search . '%')->get();
            return view('livewire.admin.voter', compact('voters'))->layout('layout.admin-app');
        }
        $this->total=User::count();
        $voters=User::orderBy('id', 'DESC')->get();
        return view('livewire.admin.voter', compact('voters'))->layout('layout.admin-app');
    }

    public function generate($lenght)
    {
        $char ='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $char_lenght= strlen($char);
        $str = "";

        for ($i=0; $i < $lenght; $i++) { 
            $str .= $char[rand(0, $char_lenght - 1)];
        }
        return $str;
    }
    public function generatePass($lenght)
    {
        $char ='1234567890';

        $char_lenght= strlen($char);
        $str = "";

        for ($i=0; $i < $lenght; $i++) { 
            $str .= $char[rand(0, $char_lenght - 1)];
        }
        return $str;
    }

    public function create()
    {
        $users = new User();

        $users->passwordNormal = $this->generatePass(6);
        $users->password = Hash::make($users->passwordNormal);
        $users->vote_id = $this->generate(5);
        $result = $users->save();

        if ($result) {
            session()->flash('success', 'voter add successfully');
        } else {
            session()->flash('error', 'voter not add successfully');
        }
    }

    public function delete($id)
    {
        $result=User::destroy($id);
        if ($result) {
            session()->flash('success', 'voter deleted successfully');
        } else {
            session()->flash('error', 'voter not deleted successfully');
        }
    }
}
