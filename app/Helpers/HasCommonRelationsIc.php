<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Ic\TypeIc;
use App\Models\Ic\BrandIc;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasCommonRelationsIc
{

    // public function Ictypes(): MorphMany
    // {
    //     return $this->morphMany(TypeIc::class, 'typeables');
    // }
    public function Ictypes(): MorphToMany
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
