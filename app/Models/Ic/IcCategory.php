<?php

namespace App\Models\Ic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class IcCategory extends Model
{
    use HasFactory;
    protected $table = 'ic_categories';



    public function icTypes(): HasMany
    {
        return $this->hasMany(IcType::class, 'ic_categorie_id');
    }
}
