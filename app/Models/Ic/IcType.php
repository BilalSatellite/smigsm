<?php

namespace App\Models\Ic;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IcType extends Model
{
    use HasFactory;
    public function icCategory(): BelongsTo
    {
        return $this->belongsTo(IcCategory::class, 'ic_categorie_id');
    }
}
