<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condidate;
use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class GetCandidateVotes extends Component
{
    public $personal = false;
    public $chart = true;
    public $candidates;
    public function render()
    {
        
        $this->candidates = Condidate::orderBy('id', 'DESC')->get();
        return view('livewire.admin.get-candidate-votes')->layout("layout.admin-app");
    }

    public function chart()
    {
        $condidate = Condidate::all();

        return response()->json($condidate);
    }

    public function openChart()
    {
        $this->personal = false;
        $this->chart = true;
    }
    public function closeChart()
    {
        $this->personal = true;
        $this->chart = false;
    }
}
