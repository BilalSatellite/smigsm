<?php

namespace App\Models\Ic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategorieIc extends Model
{
    use HasFactory;
    protected $table = 'sub_categorie_ics';
    public function getParentCategoryIc(): BelongsTo
    {
        return $this->belongsTo(CategorieIc::class, 'categorie_ic_id');
    }
}
