<?php

namespace App\Livewire;

use Livewire\Component;


use App\Models\Ic\TypeIc;
use Illuminate\Support\Facades\DB;




class TestCode extends Component
{
    public $perpage = 10;
    public $search;
    public $sortColumn = 'id';
    public $sortDirection = 'asc';
    public function updatingsearchTerm()
    {
        $this->resetPage();
    }
    public function updatingperpage()
    {
        $this->resetPage();
    }
    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }




    private function resultData()
    {
        return TypeIc::search($this->search)
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->paginate($this->perpage);
    }





    public function render()
    {


        // dd($fullOuterJoin);
        return view('livewire.test-code', [
            'data' => $this->resultData(),
        ]);
    }
}
