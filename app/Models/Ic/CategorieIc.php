<?php

namespace App\Models\Ic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategorieIc extends Model
{
    use HasFactory;
    protected $table = 'categorie_ics';
    public function getTypeIcs(): HasMany
    {
        return $this->hasMany(TypeIc::class, 'categorie_ic_id');
    }
}
