<?php

namespace App\Helpers;

use App\Models\Ic\TypeIc;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasCommonRelationsIc
{

    public function categories(): MorphToMany
    {
        return $this->morphToMany(TypeIc::class, 'typeables');
    }
}
