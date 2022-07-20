<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting as ModelsSetting;
use Livewire\Component;

class Setting extends Component
{

    public $website_name;
    public $home_name;
    public $setting_id;
    public $election_date;
    public $election_start;
    public $election_end;

    public function render()
    {
        return view('livewire.admin.setting')->layout('layout.admin-app');
    }

    public function mount()
    {
        $setting = ModelsSetting::findOrFail(1);
        $this->setting_id = $setting->id;
        $this->website_name = $setting->website_name;
        $this->home_name = $setting->home_name;
        $this->election_date = $setting->election_date;
        $this->election_start = $setting->election_time_start;
        $this->election_end = $setting->election_time_end;
    }

    public function updateSetting($id)
    {
        $setting = ModelsSetting::findOrFail(1);
        $this->validate([
            'website_name' => ['required'],
            'home_name' => ['required'],
            'election_date' => ['required'],
            'election_start' => ['required'],
            'election_end' => ['required']
        ]);

        $setting->website_name = $this->website_name;
        $setting->home_name = $this->home_name;
        $setting->election_date = $this->election_date;
        $setting->election_time_start = $this->election_start;
        $setting->election_time_end = $this->election_end;
        $result = $setting->save();
        if ($result) {
            session()->flash('success', "Setting update Successfully");
        } else {
            session()->flash('error', "Not Setting update");
        }
    }
}
