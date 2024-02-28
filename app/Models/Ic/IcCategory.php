<?php

namespace App\Models\Ic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IcCategory extends Model
{
    use HasFactory;
    public function icTypes(): HasMany
    {
        return $this->hasMany(IcType::class, 'ic_categorie_id');
    }
}
