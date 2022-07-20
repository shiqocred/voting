<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condidate as ModelsCondidate;
use App\Models\Position;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Condidate extends Component
{
    public $showTable = true;
    public $showCreate = false;
    public $showUpdate = false;
    public $total;
    public $name;
    public $color;
    public $pos_id;
    public $image;

    public $condidate_id;
    public $edit_name;
    public $edit_color;
    public $edit_pos_id;
    public $old_image;
    public $new_image;

    public $search;

    public function render()
    {
        if ($this->search != "") {
            $this->positions = Position::all();
            $this->total=ModelsCondidate::where('name', 'LIKE', '%' . $this->search . '%')->count();
            $condidates=ModelsCondidate::orderBy('id', 'DESC')->where('name', 'LIKE', '%' . $this->search . '%')->get();
            return view('livewire.admin.condidate', compact('condidates'))->layout('layout.admin-app');
        }
        $this->total = ModelsCondidate::count();
        $this->positions = Position::all();
        $condidates=ModelsCondidate::orderBy('id', 'DESC')->get();
        return view('livewire.admin.condidate', compact('condidates'))->layout('layout.admin-app');
    }

    public function goBack()
    {
        $this->showTable = true;
        $this->showCreate = false;
        $this->showUpdate = false;
    }
    
    public function showForm()
    {
        $this->showTable = false;
        $this->showCreate = true;
        $this->showUpdate = false;
    }

    public function resetField()
    {
        $this->name = '';
        $this->color = '#000';
        $this->pos_id = '';
        $this->positions = '';
        $this->image="";

        $this->condidate_id="";
        $this->edit_name="";
        $this->edit_color="#000";
        $this->edit_pos_id="";
        $this->old_image="";
        $this->new_image="";
    }

    use WithFileUploads;
    public function store()
    {
        $condidates = new ModelsCondidate();
        $this->validate([
            'name' => ['required', 'string'],
            'color' => ['required', 'string'],
            'pos_id' => ['required', 'string'],
            'image' => ['required']
        ]);

        $filename = "";
        if ($this->image != "") {
            $filename = $this->image->store('condidate', 'public');
        } else {
            $filename = "null";
        }
        $condidates->name = $this->name;
        $condidates->color = $this->color;
        $condidates->pos_id = $this->pos_id;
        $condidates->image = $filename;
        $condidates->points = 1;
        $result = $condidates->save();

        if ($result) {
            session()->flash('success', 'condidate add successfully');
            $this->goBack();
            $this->resetField();
        } else {
            session()->flash('error', 'condidate not add successfully');
        }
    }

    public function edit($id)
    {
        $this->showTable = false;
        $this->showUpdate = true;

        $condidate=ModelsCondidate::findOrFail($id);

        $this->condidate_id=$condidate->id;
        $this->edit_name=$condidate->name;
        $this->edit_color=$condidate->color;
        $this->edit_pos_id=$condidate->pos_id;
        $this->old_image=$condidate->image;
    }

    public function update($id)
    {
        $condidates = ModelsCondidate::findOrFail($id);
        $this->validate([
            'edit_name' => ['required', 'string'],
            'edit_color' => ['required', 'string'],
            'edit_pos_id' => ['required']
        ]);

        $filename = "";
        $destination = public_path("storage/".$condidates->image);
        if ($this->new_image != "") {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_image->store('condidate', 'public');
        } else {
            $filename = $this->old_image;
        }
        $condidates->name = $this->edit_name;
        $condidates->color = $this->edit_color;
        $condidates->pos_id = $this->edit_pos_id;
        $condidates->image = $filename;
        $result = $condidates->save();

        if ($result) {
            session()->flash('success', 'condidate update successfully');
            $this->goBack();
            $this->resetField();
        } else {
            session()->flash('error', 'condidate not update successfully');
        }
    }

    public function delete($id)
    {
        $condidates=ModelsCondidate::findOrFail($id);
        $destination = public_path("storage/".$condidates->image);
        if(File::exists($destination)){
            File::delete($destination);
        }
        $result = $condidates->delete();
        if ($result) {
            session()->flash('success', 'condidate deleted successfully');
            $this->goBack();
            $this->resetField();
        } else {
            session()->flash('error', 'condidate not deleted successfully');
        }
    }
}