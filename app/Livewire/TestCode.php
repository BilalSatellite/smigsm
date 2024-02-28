<?php

namespace App\Livewire;

use App\Models\Ic\Memory;
use App\Models\Ic\Power;
use App\Models\Ic\Processor;
use Livewire\Component;


use App\Models\Ic\TypeIc;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;




class TestCode extends Component
{
    // public $perpage = 10;
    public $search;
    // public $sortColumn = 'id';
    // public $sortDirection = 'asc';
    // public function updatingsearchTerm()
    // {
    //     $this->resetPage();
    // }
    // public function updatingperpage()
    // {
    //     $this->resetPage();
    // }
    // public function sort($column)
    // {
    //     $this->sortColumn = $column;
    //     $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    // }




    // private function resultData()
    // {
    //     return TypeIc::search($this->search)
    //         ->orderBy($this->sortColumn, $this->sortDirection)
    //         ->paginate($this->perpage);
    // }





    public function render()
    {
        $results = Search::add(Processor::class, ['name', 'brand.name', 'desc'])
            ->add(Power::class, ['name', 'brand.name'])
            ->add(Memory::class, ['name', 'brand.name'])
            ->includeModelType()
            ->search($this->search);


        // dd($fullOuterJoin);
        return view('livewire.test-code', [
            'data' => $results,
        ]);
    }
}
