<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Ic\IcType;
use App\Models\Ic\IcBrand;
use App\Models\Ic\IcCategory;

trait HasCommonRelationsIc
{

    public function brand()
    {
        return $this->belongsTo(IcBrand::class, 'ic_brand_id');
    }
    public function contributor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function icCategory()
    {
        return $this->belongsTo(IcCategory::class, 'ic_categorie_id');
    }
    public function icType()
    {
        return $this->belongsTo(IcType::class, 'ic_type_id');
    }
}
