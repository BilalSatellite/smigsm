<?php

namespace App\Livewire;

use App\Models\Ic\Memory;
use App\Models\Ic\Power;
use App\Models\Ic\Processor;
use Livewire\Component;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GsmAssisting extends Component
{
    public $search;

    public function render()
    {
        $result = Search::new()
            ->add(Processor::class, ['name', 'icType.name', 'icCategory.name', 'brand.name'])
            ->add(Power::class, ['name', 'icType.name', 'icCategory.name', 'brand.name'])
            ->add(Memory::class, ['name', 'icType.name', 'icCategory.name', 'brand.name'])
            ->orderByDesc()
            ->paginate($perPage = 5, $pageName = 'page')
            ->search($this->search);
        return view(
            'livewire.gsm-assisting',
            [
                'result' => $result,
            ]
        );
    }
}
