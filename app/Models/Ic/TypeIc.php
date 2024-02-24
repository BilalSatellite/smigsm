<?php

namespace App\Models\Ic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeIc extends Model
{
    use HasFactory;
    protected $table = 'type_ics';
    public function getParentCategoryIc(): BelongsTo
    {
        return $this->belongsTo(CategorieIc::class, 'categorie_ic_id');
    }
    // public function processores(): BelongsToMany
    // {
    //     return $this->belongsToMany(Processor::class, 'category_processor');
    // }

    public function typeables(): MorphTo
    {
        return $this->morphTo();
    }
}
