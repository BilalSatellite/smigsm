<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Ic\TypeIc;
use App\Models\Ic\BrandIc;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasCommonRelationsIc
{

    public function categories(): MorphToMany
    {
        return $this->morphToMany(TypeIc::class, 'typeables');
    }
    public function brand()
    {
        return $this->belongsTo(BrandIc::class, 'brand_ic_id');
    }

    public function contributor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
