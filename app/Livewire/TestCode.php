<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Ic\AttributeIc;
use App\Models\Ic\Processor;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class TestCode extends Component
{
    public $getfor;

    #[Computed]
    public function seletedattributes()
    {
        return AttributeIc::where('name', $this->getfor)->get();
    }

    public function ppp()
    {
        $data = Processor::first(1);
    }
    public function render()
    {
        // $tests = DB::table('attribute_ics')
        //     ->where('name', '=', 'Processor:Type')
        //     ->toArray();




        // build your second collection with a subset of attributes. this new
        // collection will be a collection of plain arrays, not Users models.
        $data = Processor::all();
        return view('livewire.test-code', [
            'attributeIcs' => AttributeIc::all(),
            // 'tests' => $this->user(),
            'data' => $data,
        ]);
    }
}
